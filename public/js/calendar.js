let disabledDates = [
    {"new_date": "02/08/2023"},
    {"new_date": "03/08/2023"},
    {"new_date": "04/08/2023"},
    {"new_date": "04/08/2023"},
    {"new_date": "05/08/2023"},
    {"new_date": "06/08/2023"},
    {"new_date": "09/08/2023"},
    {"new_date": "09/08/2023"},
    {"new_date": "11/08/2023"},
    {"new_date": "21/08/2023"},
];
// fetch('/get-dates')
//     .then(response => response.json())
//     .then(data => {
//         // Use the data array from the database in your JavaScript code
//         console.log(data);
//
//         // Example: You can assign the data to a global variable for use in other parts of the script
//         window.dataArray = data;
//     })
//     .catch(error => {
//         console.error('Error fetching dates:', error);
//     });

/**
 * Import Date
 *
 * @param dates { {new_date: String }[] }
 * @returns { Set<String> }
 */
function importDate(dates) {
    return new Set(dates.map(element => element.new_date));
}

/**
 * Export Date
 *
 * @param dates { Set<String> }
 * @returns { {new_date: String }[] }
 */
function exportDate(dates) {
    return Array.from(dates).map(value => ({"new_date": value}));
}

// preparation of data for internal use
let disabledDatesWork = importDate(disabledDates);

// preparing data for sending to the database
disabledDates = exportDate(disabledDatesWork);


// an array of inputs for selecting new dates that need to be blocked
// an array of inputs for selecting new dates that need to be blocked
selectDateInputs = [];
CONST = {
    CLASS: {
        selectDateCalendar: 'js_select_date_calendar',
        addDateLabel: 'js_add_date_label',
        hide: 'hide',
        disabled: 'disabled',
    },

    SEL: {
        selectDateCalendar: '.js_select_date_calendar',
        addDateLabel: '.js_add_date_label',
        calendarMain: '.calendar__visual',
        calendarTitleName: '.js_calendar table .jsCalendar-title .jsCalendar-title-name',
        calendarAddDateList: '.calendar__add_date_list',
        buttonSubmit: '.js_btn_submit',
        buttonSelectRepeater: '.js_select_repeater',
        renderListBlockedDate: '.js_list_blocked_dates',
    },
}

/*
 * SELECT NEW DATE
 */
function selectNewDates($input) {

    $input.addEventListener('focus', e => {
        e.preventDefault();
        const $input = e.target;
        const $parent = $input.parentElement;
        const $targetCalendar = $parent.querySelector(CONST.SEL.selectDateCalendar);
        const value = $input.value;

        $targetCalendar.classList.remove(CONST.CLASS.hide);


        let selectDateCalendar = null;
        if (typeof $input.data !== 'object') {

            // Calendar Instance
            selectDateCalendar = jsCalendar.new($targetCalendar, Date.now(), {
                language: 'pl',
                monthFormat: 'YYYY/#',
                dayFormat: 'DDD',
                firstDayOfTheWeek: 2,
                navigator: true,
                navigatorPosition: 'right',
                onDayRender: function (index, element, info) {
                    if (index == 0 || index == 6) {
                        element.style.color = '#c32525';
                    }
                },
                onMonthRender: function (index, element, info) {

                    // add a month wrapper <span> for the header
                    const $title = document.querySelector(CONST.SEL.calendarTitleName)
                    let parts = element.innerText.split('/');
                    $title.innerHTML = parts[0] + '/<span>' + parts[1] + '</span>';
                },
                onDateRender: function (date, element, info) {
                    // Disabled Date
                    const currDate = customFormatDate(date);
                    if (disabledDatesWork.has(currDate) || getPreviousDay() >= date) {
                        element.classList.add(CONST.CLASS.disabled);
                    }

                    // weekend colors
                    if (!info.isCurrent && (date.getDay() == 0 || date.getDay() == 6)) {
                        element.style.fontWeight = 'bold';
                        element.style.color = (info.isCurrentMonth) ? '#c32525' : '#ffb4b4';
                    }
                },
            });

            // Select Date
            selectDateCalendar.onDateClick(function (event, date) {
                const $target = event.target;
                const isDisabled = $target.classList.contains(CONST.CLASS.disabled);
                if (!isDisabled) {
                    selectDateCalendar.refresh();
                    $target.classList.add('select');
                    $input.value = customFormatDate(date);
                    // close calendar wrapper
                    $target.closest(CONST.SEL.selectDateCalendar).classList.add(CONST.CLASS.hide);
                }
            });

            $input.data = selectDateCalendar;
        }
    });
}

function renderListBlockedDates() {
    const $wrapper = document.querySelector(CONST.SEL.renderListBlockedDate);
    const template = '' +
        '<li class="calendar__date_item">' +
        '<span>%%% [ </span>' +
        '<a onclick="removeDisabledDate(this, \'%%%\')" data-blocked_date="%%%" href="#">usuń</a>' +
        '<span> ]</span>' +
        '</li>';

    const items = [];
    disabledDatesWork.forEach(date => {
        items.push(template.replaceAll('%%%', date));
    });

    $wrapper.innerHTML = items.join('');
}

function removeDisabledDate(self, date) {
    const parent = self.parentElement;

    disabledDatesWork.forEach(setDate => {
        if (setDate === date) {
            disabledDatesWork.delete(date);
        }
    });

    calendar.refresh();
    parent.remove();

    console.log(disabledDates);
    disabledDates = exportDate(disabledDatesWork);
    console.log(disabledDates);
}

function getPreviousDay(date = new Date()) {
    const previous = new Date(date.getTime());
    previous.setDate(date.getDate() - 1);
    previous.setHours(23, 59, 59, 999);
    return previous;
}

pad = d => (d < 10) ? '0' + d.toString() : d.toString();

customFormatDate = date => {
    return this.pad(date.getDate()) + '/' + this.pad(date.getMonth() + 1) + '/' + date.getFullYear();
}

class CalendarClass {

    constructor(disabledDatesWork, selectDateInputs) {
        this.disabledDatesWork = disabledDatesWork;
        this.selectDateInputs = selectDateInputs;

        this.initializeCalendar();
        this.initializeEventListeners();
    }

    getCalendar(array) {
        return exportDate(array);
    }


    initializeCalendar() {
        // instance view Calendar
        this.calendar = jsCalendar.new(CONST.SEL.calendarMain, Date.now(), {
            language: 'pl',
            monthFormat: 'YYYY/#',
            dayFormat: 'DDD',
            firstDayOfTheWeek: 2,
            navigator: true,
            navigatorPosition: 'right',
            onDayRender: function (index, element, info) {
                // console.log(index, element, info)
                if (index == 0 || index == 6) {
                    element.style.color = '#c32525';
                }
            },
            onMonthRender: function (index, element, info) {

                // add a month wrapper <span> for the header
                const $title = document.querySelector(CONST.SEL.calendarTitleName)
                let parts = element.innerText.split('/');
                $title.innerHTML = parts[0] + '/<span>' + parts[1] + '</span>';
            },
            onDateRender: function (date, element, info) {

                // Disabled Date
                const currDate = customFormatDate(date);
                if (disabledDatesWork.has(currDate) || getPreviousDay() >= date) {
                    element.classList.add(CONST.CLASS.disabled);
                }

                // weekend colors
                if (!info.isCurrent && (date.getDay() == 0 || date.getDay() == 6)) {
                    element.style.fontWeight = 'bold';
                    element.style.color = (info.isCurrentMonth) ? '#c32525' : '#ffb4b4';
                }
            },

        });

    }

    initializeEventListeners() {
        document.addEventListener('click', e => {
            e.preventDefault();
            const $target = e.target;

            if (!$target.closest(CONST.SEL.addDateLabel)) {
                const selectCalendarWrapper = document.querySelectorAll(CONST.SEL.selectDateCalendar);
                selectCalendarWrapper.forEach(selectCalendar => {
                    selectCalendar.classList.add(CONST.CLASS.hide);
                })
            }
        })
        const buttonRepeat = document.querySelector(CONST.SEL.buttonSelectRepeater);
        buttonRepeat.addEventListener('click', e => {
            const id = selectDateInputs.length;
            const template = `
    <label class="calendar__add_date_label ${CONST.CLASS.addDateLabel}" data-add_date_id="${id}">
        <input class="calendar__select_date_input" name="add_date_${id}" type="text" placeholder="wybierz datę...">
        <div class="date_selection_calendar ${CONST.CLASS.selectDateCalendar}"></div>
    </label>
    `;
            const listItem = document.createElement('LI');
            listItem.classList.add('calendar__add_date_item');
            listItem.innerHTML = template;

            const selectDateInputWrapper = document.querySelector(CONST.SEL.calendarAddDateList);
            selectDateInputWrapper.append(listItem);
            selectDateInputs.push(listItem);
            selectNewDates(listItem.querySelector('input'));
        });
        /*
 * BUTTON SUBMIT
 */
        const buttonSubmit = document.querySelector(CONST.SEL.buttonSubmit);
        buttonSubmit.addEventListener('click', e => {
            if (selectDateInputs.length === 0) {
                return;
            }

            const arrValues = selectDateInputs.map(itemElement => {
                return itemElement.querySelector('input').value;
            });

            new Set(arrValues).forEach(value => {
                if (value) {
                    disabledDatesWork.add(value);
                }
            });

            renderListBlockedDates();
            this.calendar.refresh();
            selectDateInputs.length = 0;
            document.querySelector(CONST.SEL.calendarAddDateList).innerHTML = '';


            console.log(disabledDates);
            disabledDates = exportDate(disabledDatesWork);
            console.log(disabledDates);
        });
    }


// instance view Calendar


}

//
// /**
//  * Import Date
//  *
//  * @param dates { {new_date: String }[] }
//  * @returns { Set<String> }
//  */
// function importDate(dates) {
//     return new Set(dates.map(element => element.new_date));
// }
//
// /**
//  * Export Date
//  *
//  * @param dates { Set<String> }
//  * @returns { {new_date: String }[] }
//  */
// function exportDate(dates) {
//     return Array.from(dates).map(value => ({"new_date": value}));
// }
//
// // preparation of data for internal use
// let disabledDatesWork = importDate(dataArray);
//
// // preparing data for sending to the database
// disabledDates = exportDate(disabledDatesWork);
//
//
// // an array of inputs for selecting new dates that need to be blocked
// const selectDateInputs = [];
//
// /*
//  * CONSTANTS
//  */
// const CONST = {
//     CLASS: {
//         selectDateCalendar: 'js_select_date_calendar',
//         addDateLabel: 'js_add_date_label',
//         hide: 'hide',
//         disabled: 'disabled',
//     },
//
//     SEL: {
//         selectDateCalendar: '.js_select_date_calendar',
//         addDateLabel: '.js_add_date_label',
//         calendarMain: '.calendar__visual',
//         calendarTitleName: '.js_calendar table .jsCalendar-title .jsCalendar-title-name',
//         calendarAddDateList: '.calendar__add_date_list',
//         buttonSubmit: '.js_btn_submit',
//         buttonSelectRepeater: '.js_select_repeater',
//         renderListBlockedDate: '.js_list_blocked_dates',
//     },
// }
//
//
// /*
//  * HELPERS
//  */
//
// // return 1 to 01, 2 to 02 etc.
// const pad = d => (d < 10) ? '0' + d.toString() : d.toString();
//
// const formatDate = date => {
//     return pad(date.getDate()) + '/' + pad(date.getMonth() + 1) + '/' + date.getFullYear();
// }
//
// /*
//  * Close Selector Calendars
//  */
// document.addEventListener('click', e => {
//     e.preventDefault();
//     const $target = e.target;
//
//     if (!$target.closest(CONST.SEL.addDateLabel)) {
//         const selectCalendarWrapper = document.querySelectorAll(CONST.SEL.selectDateCalendar);
//         selectCalendarWrapper.forEach(selectCalendar => {
//             selectCalendar.classList.add(CONST.CLASS.hide);
//         })
//     }
// })
//
// function getPreviousDay(date = new Date()) {
//     const previous = new Date(date.getTime());
//     previous.setDate(date.getDate() - 1);
//     previous.setHours(23, 59, 59, 999);
//     return previous;
// }
//
// // instance view Calendar
// const calendar = jsCalendar.new(CONST.SEL.calendarMain, Date.now(), {
//     language: 'pl',
//     monthFormat: 'YYYY/#',
//     dayFormat: 'DDD',
//     firstDayOfTheWeek: 2,
//     navigator: true,
//     navigatorPosition: 'right',
//     onDayRender: function (index, element, info) {
//         // console.log(index, element, info)
//         if (index == 0 || index == 6) {
//             element.style.color = '#c32525';
//         }
//     },
//     onMonthRender: function (index, element, info) {
//
//         // add a month wrapper <span> for the header
//         const $title = document.querySelector(CONST.SEL.calendarTitleName)
//         let parts = element.innerText.split('/');
//         $title.innerHTML = parts[0] + '/<span>' + parts[1] + '</span>';
//     },
//     onDateRender: function (date, element, info) {
//
//         // Disabled Date
//         const currDate = formatDate(date);
//         if (disabledDatesWork.has(currDate) || getPreviousDay() >= date) {
//             element.classList.add(CONST.CLASS.disabled);
//         }
//
//         // weekend colors
//         if (!info.isCurrent && (date.getDay() == 0 || date.getDay() == 6)) {
//             element.style.fontWeight = 'bold';
//             element.style.color = (info.isCurrentMonth) ? '#c32525' : '#ffb4b4';
//         }
//     },
//
// });
//
// function renderListBlockedDates() {
//     const $wrapper = document.querySelector(CONST.SEL.renderListBlockedDate);
//     const template = '' +
//         '<li class="calendar__date_item">' +
//         '<span>%%% [ </span>' +
//         '<a onclick="removeDisabledDate(this, \'%%%\')" data-blocked_date="%%%" href="#">usuń</a>' +
//         '<span> ]</span>' +
//         '</li>';
//
//     const items = [];
//     disabledDatesWork.forEach(date => {
//         items.push(template.replaceAll('%%%', date));
//     });
//
//     $wrapper.innerHTML = items.join('');
// }
//
// function removeDisabledDate(self, date) {
//     const parent = self.parentElement;
//
//     disabledDatesWork.forEach(setDate => {
//         if (setDate === date) {
//             disabledDatesWork.delete(date);
//         }
//     });
//
//     calendar.refresh();
//     parent.remove();
//
//     console.log(disabledDates);
//     disabledDates = exportDate(disabledDatesWork);
//     console.log(disabledDates);
// }
//
// renderListBlockedDates();
//
//
// /*
//  * SELECT NEW DATE
//  */
// function selectNewDates($input) {
//
//     $input.addEventListener('focus', e => {
//         e.preventDefault();
//         const $input = e.target;
//         const $parent = $input.parentElement;
//         const $targetCalendar = $parent.querySelector(CONST.SEL.selectDateCalendar);
//         const value = $input.value;
//
//         $targetCalendar.classList.remove(CONST.CLASS.hide);
//
//
//         let selectDateCalendar = null;
//         if (typeof $input.data !== 'object') {
//
//             // Calendar Instance
//             selectDateCalendar = jsCalendar.new($targetCalendar, Date.now(), {
//                 language: 'pl',
//                 monthFormat: 'YYYY/#',
//                 dayFormat: 'DDD',
//                 firstDayOfTheWeek: 2,
//                 navigator: true,
//                 navigatorPosition: 'right',
//                 onDayRender: function (index, element, info) {
//                     if (index == 0 || index == 6) {
//                         element.style.color = '#c32525';
//                     }
//                 },
//                 onMonthRender: function (index, element, info) {
//
//                     // add a month wrapper <span> for the header
//                     const $title = document.querySelector(CONST.SEL.calendarTitleName)
//                     let parts = element.innerText.split('/');
//                     $title.innerHTML = parts[0] + '/<span>' + parts[1] + '</span>';
//                 },
//                 onDateRender: function (date, element, info) {
//                     // Disabled Date
//                     const currDate = formatDate(date);
//                     if (disabledDatesWork.has(currDate) || getPreviousDay() >= date) {
//                         element.classList.add(CONST.CLASS.disabled);
//                     }
//
//                     // weekend colors
//                     if (!info.isCurrent && (date.getDay() == 0 || date.getDay() == 6)) {
//                         element.style.fontWeight = 'bold';
//                         element.style.color = (info.isCurrentMonth) ? '#c32525' : '#ffb4b4';
//                     }
//                 },
//             });
//
//             // Select Date
//             selectDateCalendar.onDateClick(function (event, date) {
//                 const $target = event.target;
//                 const isDisabled = $target.classList.contains(CONST.CLASS.disabled);
//                 if (!isDisabled) {
//                     selectDateCalendar.refresh();
//                     $target.classList.add('select');
//                     $input.value = formatDate(date);
//                     // close calendar wrapper
//                     $target.closest(CONST.SEL.selectDateCalendar).classList.add(CONST.CLASS.hide);
//                 }
//             });
//
//             $input.data = selectDateCalendar;
//         }
//     });
// }
//
//
// /*
//  * REPEAT INPUT
//  */
// const buttonRepeat = document.querySelector(CONST.SEL.buttonSelectRepeater);
// buttonRepeat.addEventListener('click', e => {
//     const id = selectDateInputs.length;
//     const template = `
//     <label class="calendar__add_date_label ${CONST.CLASS.addDateLabel}" data-add_date_id="${id}">
//         <input class="calendar__select_date_input" name="add_date_${id}" type="text" placeholder="wybierz datę...">
//         <div class="date_selection_calendar ${CONST.CLASS.selectDateCalendar}"></div>
//     </label>
//     `;
//     const listItem = document.createElement('LI');
//     listItem.classList.add('calendar__add_date_item');
//     listItem.innerHTML = template;
//
//     const selectDateInputWrapper = document.querySelector(CONST.SEL.calendarAddDateList);
//     selectDateInputWrapper.append(listItem);
//     selectDateInputs.push(listItem);
//     selectNewDates(listItem.querySelector('input'));
// });
//
//
// /*
//  * BUTTON SUBMIT
//  */
// const buttonSubmit = document.querySelector(CONST.SEL.buttonSubmit);
// buttonSubmit.addEventListener('click', e => {
//     if (selectDateInputs.length === 0) {
//         return;
//     }
//
//     const arrValues = selectDateInputs.map(itemElement => {
//         return itemElement.querySelector('input').value;
//     });
//
//     new Set(arrValues).forEach(value => {
//         if (value) {
//             disabledDatesWork.add(value);
//         }
//     });
//
//     renderListBlockedDates();
//     calendar.refresh();
//     selectDateInputs.length = 0;
//     document.querySelector(CONST.SEL.calendarAddDateList).innerHTML = '';
//
//
//     console.log(disabledDates);
//     disabledDates = exportDate(disabledDatesWork);
//     console.log(disabledDates);
// });


