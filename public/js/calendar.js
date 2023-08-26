class CalendarIk {
    calendar = null;
    dates = [];
    selectDate = '';
    selectDateFrom = '';
    selectDateTo = '';

    class = {
        hide: 'hide',
        disabled: 'disabled',
        select: 'select',
    }

    constructor( args ) {
        this.class.wrapper = args.calendarWrapperClass;
        this.class.calendarTitleName = this.class.wrapper + ' ' + 'table .jsCalendar-title .jsCalendar-title-name';
        this.dates = args.dates;

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
        this.setClassNames(index, element);
    }

    dateRender(date, element, info) {
        const fDate = this.formatDate(date);

        $(element).addClass('calendar_date');
        $(element).attr("data-calendar-date", fDate);

        // Selected Date
        if ( fDate === this.selectDate || fDate === this.selectDateFrom || fDate === this.selectDateTo ) {
            $(element).addClass(this.class.select);
        }

        // Disabled Date
        if (this.containsValueInArray(this.dates, fDate) || this.getPreviousDay() >= date) {
            $(element).addClass(this.class.disabled);
        }

        // weekend
        if (!info.isCurrent) {
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
            $(element).addClass('weekend');

            if (index === 0) {
                $(element).addClass('sunday');
            } else {
                $(element).addClass('saturday');
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

    // return format YYYY-MM-DD
    formatDate = date => date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
}

class DatesList {
    class = {};
    dates = [];
    mainCalendar = null;
    calendarsWatch = {
        list: [],
    };

    constructor( args ) {
        this.mainCalendar = args.mainCalendar;
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
        const listDates = $('.' + this.class.dateList);

        if (!listDates) {
            return -1;
        }

        this.dates
            .filter(d => new Date(d.new_date) >= new Date().setHours(0, 0, 0, 0) - 1)
            .sort((a, b) => new Date(a.new_date) - new Date(b.new_date))
            .map(d => d.new_date)
            .forEach(date => {
                var token = $('meta[name="csrf-token"]').attr('content');
                listDates.append(`<li><span class="d-flex">${date.split('-').reverse().join('/')} [
                    <form class="delete-form" method="POST">
                        <input type="hidden" name="_token" value="${token}">
                        <input type="hidden" name="blockedDate" value="${date}">
                        <button type="submit" class="delete-button btn btn-link" style="padding: 0 4px; margin-top:-5px;">usuń</button>
                    </form>]</span>
                </li>`);
            })
    }


    /*
     * REPEAT INPUT
     */
    createItemsInputs = () => {
        // an array of inputs for selecting new dates that need to be blocked
        var itemCount = 0;

        /* CREATE ITEMS INPUTS */
        $('.calendar__add_date_btn').on('click', e => {
            e.preventDefault();
            itemCount++;

            var item = $('<li>', { class: 'calendar__add_date_item' });

            item.append(`<label class="calendar__add_date_label" data-add_date_id="${itemCount}">
                <input class="calendar__add_date_input inpt_trgt_ind_${itemCount}" name="field_date_${itemCount}" type="text" placeholder="wybierz datę..."  autocomplete="off" >
            </label>
            <div class="calendar__add_date_select calendar_box_${itemCount}"></div>`);

            $('.calendar__add_date_list').append(item);

            item.find('input').on('focus', createCalendar);
            item.find('input').on('focus', showCalendar);

        })

        const createCalendar = event => {
            event.preventDefault();

            if ( ! $(event.target).attr('data-is-calendar') ) {
                const calendarBox = $(event.target).parent().next();
                this.calendarsWatch.list.push(calendarBox);

                this.toggleClassList(calendarBox, false);
                new CalendarIk({
                    dates: this.dates,
                    calendarWrapperClass: '.' + calendarBox.attr('class').split(' ')[1],
                });
                $(event.target).attr('data-is-calendar', true );
            }
        }

        const showCalendar = event => {
            const calendarBox = $(event.target).parent().next();
            this.calendarsWatch.list.push(calendarBox);
            this.toggleClassList(calendarBox, false);
        }

        // hide Calendars
        (() => {
            $(document).on('click', event => {
                if ( ! $(event.target).closest('.calendar__add_date_item').length ) {
                    while (this.calendarsWatch.list.length) {
                        var calendar = this.calendarsWatch.list.pop()
                        this.toggleClassList(calendar);
                    }
                }
            })
        })();
    }

    // HELPERS
    toggleClassList = (elem, collapse = true) => {
        if (collapse) {
            $(elem).addClass('collapse_calendar');
            $(elem).removeClass('expand_calendar');
        } else {
            $(elem).addClass('expand_calendar');
            $(elem).removeClass('collapse_calendar');
        }
    }
}
