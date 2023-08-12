class CalendarIk {
    calendar = null;
    dates = [];

    class = {
        hide: 'hide',
        disabled: 'disabled',
        select: 'select',
    }

    constructor({...args}) {
        this.class.wrapper = args.calendarWrapperClass;
        this.dates = args.dates;
        this.class.calendarTitleName = this.class.wrapper + ' ' + 'table .jsCalendar-title .jsCalendar-title-name';

        this.init();
    }

    init() {
        if (!this.dates) {
            return false;
        }

        this.calendar = jsCalendar.new(this.class.wrapper, Date.now(), {
            language: 'pl',
            monthFormat: 'YYYY/#',
            dayFormat: 'DDD',
            firstDayOfTheWeek: 2,
            navigator: true,
            navigatorPosition: 'right',
            onDayRender: this.dayRender.bind(this),
            onMonthRender: this.monthRender.bind(this),
            onDateRender: this.dateRender.bind(this),
        });
    }

    dayRender(index, element, info) {
        if (index === 0 || index === 6) {
            this.setClassNames(index, element);
        }
    }

    dateRender(date, element, info) {
        const fDate = this.formatDate(date);

        element.classList.add('calendar_date');
        element.setAttribute("data-calendar-date", fDate);

        // Disabled Date
        if (this.containsValueInArray(this.dates, fDate) || this.getPreviousDay() >= date) {
            element.classList.add(this.class.disabled);
        }

        // weekend
        if (!info.isCurrent && (date.getDay() === 0 || date.getDay() === 6)) {
            this.setClassNames(date.getDay(), element)
        }
    }

    monthRender(index, element, info) {
        // add a month wrapper <span> for the header
        const $title = document.querySelector(this.class.calendarTitleName)
        let parts = element.innerText.split('/');

        if ($title) {
            $title.innerHTML = parts[0] + '/<span>' + parts[1] + '</span>';
        }
    }


    // Helpers
    setClassNames = function (index, element) {
        if (index === 0 || index === 6) {
            element.classList.add('weekend');

            if (index === 0) {
                element.classList.add('sunday');
            } else {
                element.classList.add('saturday');
            }

        }
    }

    containsValueInArray = function (arr, value) {
        for (let i = 0; i < arr.length; i++) {
            if (arr[i].new_date === value) {
                return true;
            }
        }
        return false;
    }

    getPreviousDay = function (date = new Date()) {
        const previous = new Date(date.getTime());
        previous.setDate(date.getDate() - 1);
        previous.setHours(23, 59, 59, 999);
        return previous;
    }

    pad = function (d) {
        return (d < 10) ? '0' + d.toString() : d.toString()
    };

    formatDate = function (date) {
        return this.pad(date.getDate()) + '/' + this.pad(date.getMonth() + 1) + '/' + date.getFullYear();
    }
}

class DatesList {
    class = {};
    dates = [];

    constructor({...args}) {
        this.calendar = args.calendar;
        this.dates = args.dates;
        this.class.dateList = args.dateListClass;

        this.init();
    }

    init() {
        this.listDatesRender();
        this.createItemsInputs();
    }

    // Render Dates List
    listDatesRender() {
        const listDates = document.querySelector('.' + this.class.dateList);
        if (!listDates) {
            return -1;
        }

        this.dates.forEach(date => {
            if (this.compareDate(date)) {
                var token = $('meta[name="csrf-token"]').attr('content');
                const item = document.createElement('LI');
                item.innerHTML = `
                <span class="d-flex">${date.new_date} [
                  <form class="delete-form" method="POST">
       <input type="hidden" name="_token" value="${token}">
        <input type="hidden" name="blockedDate" value="${date.new_date}">
        <button type="submit" class="delete-button btn btn-link">usuń</button>
    </form>]</span>`;
                listDates.append(item);
            }
        });
    }



    /*
     * REPEAT INPUT
     */
    createItemsInputs = () => {
        // an array of inputs for selecting new dates that need to be blocked
        const calendarsBox = [];
        let itemCount = 0;

        /* CREATE ITEMS INPUTS */
        const buttonAddNewDate = document.querySelector('.calendar__add_date_btn');
        buttonAddNewDate.addEventListener('click', e => {
            e.preventDefault();
            itemCount++;

            const template = `<label class="calendar__add_date_label" data-add_date_id="${itemCount}">
                <input class="calendar__add_date_input inpt_trgt_ind_${itemCount}" name="field_date_${itemCount}" type="text" placeholder="wybierz datę...">
                <div class="calendar__add_date_preloader hidden"><div></div><div></div><div></div><div></div></div>
            </label>
            <div class="calendar__add_date_select calendar_box_${itemCount}"></div>`;

            const item = document.createElement('LI');
            item.classList.add('calendar__add_date_item');
            item.innerHTML = template;

            const inputsList = document.querySelector('.calendar__add_date_list');
            inputsList.append(item);

            item.querySelector('input').addEventListener('focus', createCalendar.bind(this, fData), {once: true});
            item.querySelector('input').addEventListener('focus', showCalendar);
        })

        const createCalendar = (data, event) => {
            event.preventDefault();
            const calendarBox = event.target.parentElement.nextElementSibling;
            calendarsBox.push(calendarBox);
            const value = event.target.value;

            this.toggleClassList(calendarBox, false);

            const calend = new CalendarIk({
                dates: this.dates,
                calendarWrapperClass: '.' + calendarBox.classList[1],
            });
            onDateClick(calendarBox, '.' + event.target.classList[1], '.' + calendarBox.classList[1]);
        }

        // Function ONClick Date Calendar
        const onDateClick = (calendarBox, inputSelector, calendSelector) => {

            const dates = document.querySelectorAll(calendSelector + ' .calendar_date');

            dates.forEach(date => {
                if (!date.classList.contains('disabled')) {

                    date.addEventListener('click', event => {
                        dates.forEach(d => d.classList.remove('select'));
                        date.classList.add('select');

                        const $input = document.querySelector(inputSelector);
                        if ($input) {
                            $input.value = date.dataset.calendarDate;
                        }

                        this.toggleClassList(calendarBox);
                    })
                }
            });

        }

        // hide Calendars
        (() => {
            document.addEventListener('click', event => {
                if (!(event.target.closest('.calendar__add_date_item'))) {
                    while (calendarsBox.length) {
                        this.toggleClassList(calendarsBox.pop());
                    }
                }
            })
        })()

        const showCalendar = event => {
            const calendarBox = event.target.parentElement.nextElementSibling;
            calendarsBox.push(calendarBox);
            this.toggleClassList(calendarBox, false);
        }
    }
















    // HELPERS
    compareDate = function (date) {
        const d = date.new_date.split('/');
        const date1 = new Date(d[2], d[1] - 1, d[0]);
        const date2 = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() - 1, 23, 59, 59, 999);
        return date1 > date2;
    }

    toggleClassList = (elem, collapse = true) => {
        if (collapse) {
            elem.classList.add('collapse_calendar');
            elem.classList.remove('expand_calendar');
        } else {
            elem.classList.add('expand_calendar');
            elem.classList.remove('collapse_calendar');
        }
    }
}
