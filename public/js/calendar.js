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

    // addActionForRemoveDate() {
    //     const listDates = document.querySelectorAll('[data-blocked-date]');
    //
    //     listDates.forEach(item => {
    //         // For each Button Delete link
    //         item.addEventListener('click', e => {
    //             e.preventDefault();
    //             const date = e.currentTarget.dataset.blockedDate;
    //
    //             let i = 0;
    //             while (i < this.dates.length) {
    //                 if (this.dates[i].new_date === date) {
    //
    //
    //                     // TODO: this insert code for ajax method for delete date
    //                     const deletedDate = this.dates.splice(i, 1);
    //                     console.log('deleted date: ', deletedDate)
    //
    //
    //                 } else {
    //                     ++i;
    //                 }
    //             }
    //
    //             this.calendar.refresh();
    //             item.parentElement.remove();
    //         });
    //     });
    // }

    // HELPERS
    compareDate = function (date) {
        const d = date.new_date.split('/');
        const date1 = new Date(d[2], d[1] - 1, d[0]);
        const date2 = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate() - 1, 23, 59, 59, 999);
        return date1 > date2;
    }
}
