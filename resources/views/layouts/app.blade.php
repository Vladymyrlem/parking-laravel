<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jsCalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="{{ asset('js/navbar/responsive-nav.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">

    @yield('styles')
    <style>
        header {
            background: #fff;
            position: fixed;
            z-index: 3;
            width: 100%;
            left: 0;
            top: 0;

        }

        .hidden-textarea {
            position: absolute;
            top: -9999px;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
        }

        nav ul > li a {
            height: auto;
        }
    </style>

</head>
<body class="hold-transition sidebar-collapse">
<div class="wrapper">

    <!-- Navbar -->
    <header class="main-header navbar navbar-expand navbar-white navbar-light">
        <a href="/admin" class="brand-link">
            <img src="{{ asset('images/parking-logo.png') }}" alt="Parking Rondo Logo"
                 class="brand-image"
                 style="opacity: 1">
        </a>
        <nav class="nav-collapse nav-collapse-0 closed" style="transition: max-height 284ms ease 0s;
position: relative;" aria-hidden="true">
            <ul>
                <li class="menu-item"><a class="nav-link scroll-to" href="#header-block" data-scroll>Start</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#aboutus" data-scroll>O Nas</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#gallery" data-scroll>Galeria</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#locations" data-scroll>Dojazrd</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#contacts-section" data-scroll>Kontakt</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#terms" data-scroll>Regulamin</a></li>
            </ul>
        </nav>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                        <i class="mr-2 fas fa-file"></i>
                        {{ __('My profile') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fas fa-sign-out-alt"></i>
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </header>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="{{ asset('images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        {{--        <nav class="nav-collapse nav-collapse-0 closed" style="transition: max-height 284ms ease 0s;--}}
        {{--position: relative;" aria-hidden="true">--}}
        {{--            <ul>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#header-block" data-scroll>Start</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#aboutus" data-scroll>O Nas</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#gallery" data-scroll>Galeria</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#locations" data-scroll>Dojazrd</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#contacts-section" data-scroll>Kontakt</a></li>--}}
        {{--                <li class="menu-item"><a class="nav-link scroll-to" href="#terms" data-scroll>Regulamin</a></li>--}}
        {{--            </ul>--}}
        {{--        </nav>--}}
        @include('layouts.navigation')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/jsCalendar/jsCalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jsCalendar/jsCalendar.lang.pl.js') }}"></script>
<script src="{{asset('js/calendar.js')}}"></script>
<script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{mix('js/ajaxscript.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

@yield('scripts')
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">

<!-- MODAL SECTION -->
<!-- Head Block Modal-->
@include('partials.modal.head-modal')
@include('partials.modal.services-modal')

@include('partials.modal.about-us-modal')
<!-- Reviews Modal-->
@include('partials.modal.review-modal')
<!-- Contacts Modal-->
@include('partials.modal.contacts-modal')
<!-- Section title Modal-->
@include('partials.modal.section-title-modal')
@include('partials.modal.newsletter-modal')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/datatables/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('js/navbar/fastclick.js') }}" async></script>
<script src="{{ asset('js/navbar/scroll.js') }}" async></script>
<script src="{{ asset('js/navbar/fixed-responsive-nav.js') }}" async></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function dateSort(a, b) {
        var aDate = new Date(a);
        var bDate = new Date(b);
        return aDate - bDate;
    }

    $('#parkingTable').bootstrapTable({
        height: 550,
        locale: 'pl',
        toolbar: '.toolbar'
    });
    $('#sortByToday').on('click', function () {
        $('#parkingTable').bootstrapTable('filterBy', {
            arrival: new Date().toISOString().split('T')[0]
        });
    });
    $('#resetFilters').on('click', function () {
        $('#parkingTable').bootstrapTable('destroy');
        $('#parkingTable').bootstrapTable({
            toolbar: '#customToolbar'
        });
    });
    var $table = $('#table')
    var $remove = $('#remove')
    var selections = []

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1
        })
        return res
    }

    function detailFormatter(index, row) {
        var html = []
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        })
        return html.join('')
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('')
    }

    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row))
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            })
        }
    }

    function totalTextFormatter(data) {
        return 'Total'
    }

    function totalNameFormatter(data) {
        return data.length
    }

    function totalPriceFormatter(data) {
        var field = this.field
        return '$' + data.map(function (row) {
            return +row[field].substring(1)
        }).reduce(function (sum, i) {
            return sum + i
        }, 0)
    }

    function initTable() {
        $table.bootstrapTable('destroy').bootstrapTable({
            height: 550,
            locale: $('#locale').val(),
            columns: [
                [{
                    field: 'arrival',
                    checkbox: true,
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle'
                }, {
                    title: 'Item ID',
                    field: 'id',
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    footerFormatter: totalTextFormatter
                }, {
                    title: 'Item Detail',
                    colspan: 3,
                    align: 'center'
                }],
                [{
                    field: 'name',
                    title: 'Item Name',
                    sortable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'price',
                    title: 'Item Price',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'client_name',
                    title: 'Item Operate',
                    align: 'center',
                    clickToSelect: false,
                    events: window.operateEvents,
                    formatter: operateFormatter
                }]
            ]
        })
        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function () {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelections()
                // push or splice the selections if you want to save all data selections
            })
        $table.on('all.bs.table', function (e, name, args) {
            console.log(name, args)
        })
        $remove.click(function () {
            var ids = getIdSelections()
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })
            $remove.prop('disabled', true)
        })
    }

    $(function () {
        initTable()

        $('#locale').change(initTable)
    })
</script>
<script>
    // Check if both checkbox and CAPTCHA are validated
    // function checkValidation() {
    //     var isCaptchaVerified = grecaptcha.getResponse().length !== 0;
    //     var isAgreeChecked = document.getElementById('agree').checked;
    //
    //     if (isCaptchaVerified && isAgreeChecked) {
    //         document.getElementById('subscribeButton').disabled = false;
    //     } else {
    //         document.getElementById('subscribeButton').disabled = true;
    //     }
    // }
    //
    // // Enable form submission on checkbox change
    // document.getElementById('agree').addEventListener('change', checkValidation);
    //
    // // Enable form submission on CAPTCHA verification
    // function captchaCallback() {
    //     checkValidation();
    // }

    // AJAX form submission
    $('#subscribeForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data
        var url = $(this).attr('action'); // Form action URL

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json', // Change to 'html' if the response is not JSON
            success: function (response) {
                // Handle the success response, e.g., show success message or close modal
                $('#subscribeModal').modal('hide');
                alert('You have subscribed successfully!');
            },
            error: function (error) {
                // Handle the error response, e.g., show error message
                alert('Failed to subscribe. Please try again later.');
            }
        });
    });
</script>
@if(isset($arrayData))
    <script>
        jQuery(function ($) {
            var url = $('#url').val();

            let data = <?php echo json_encode($arrayData); ?>;
            // data.push({new_date: '09/08/2023'});
            // data.push({new_date: '18/08/2023'});
            // data.push({new_date: '03/09/2023'});

            // $('.js_calendar').data( 'calendar_dates', { data, url } );

            const calendar1 = new CalendarIk({
                dates: data,
                calendarWrapperClass: '.calendar__main_calendar',
            });

            const datesList = new DatesList({
                dates: data,
                calendar: calendar1.calendar,
                dateListClass: 'calendar__date_list',
            });

            // Function ONClick Date Calendar
            function onDateClick(calendarBox, inputSelector, calendSelector) {

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

                            toggleClassList(calendarBox);
                        })
                    }
                });

            }

            /*
             * REPEAT INPUT
             */
            // an array of inputs for selecting new dates that need to be blocked
            const calendarsBox = [];
            let itemCount = 0;

            const toggleClassList = (elem, collapse = true) => {
                if (collapse) {
                    elem.classList.add('collapse_calendar');
                    elem.classList.remove('expand_calendar');
                } else {
                    elem.classList.add('expand_calendar');
                    elem.classList.remove('collapse_calendar');
                }
            }

            /*
             * CREATE ITEMS INPUTS
             */
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

                item.querySelector('input').addEventListener('focus', createCalendar.bind(this, data), {once: true});
                item.querySelector('input').addEventListener('focus', showCalendar);
            })

            const createCalendar = (data, event) => {
                event.preventDefault();
                const calendarBox = event.target.parentElement.nextElementSibling;
                calendarsBox.push(calendarBox);
                const value = event.target.value;

                toggleClassList(calendarBox, false);

                const calend = new CalendarIk({
                    dates: data,
                    calendarWrapperClass: '.' + calendarBox.classList[1],
                });
                onDateClick(calendarBox, '.' + event.target.classList[1], '.' + calendarBox.classList[1]);
            }

            // hide Calendars
            (() => {
                document.addEventListener('click', event => {
                    if (!(event.target.closest('.calendar__add_date_item'))) {
                        while (calendarsBox.length) {
                            toggleClassList(calendarsBox.pop());
                        }
                    }
                })
            })()

            const showCalendar = event => {
                const calendarBox = event.target.parentElement.nextElementSibling;
                calendarsBox.push(calendarBox);
                toggleClassList(calendarBox, false);
            }


            /*
             * SAVE DATES
             */
            const submitButton = document.querySelector('.js_btn_submit');
            submitButton.addEventListener('click', event => {
                event.preventDefault();

                const items = document.querySelectorAll('.calendar__add_date_item');
                const selectedDates = {}; // Initialize the selectedDates object

                items.forEach(item => {
                    const input = item.querySelector('input');
                    const value = input?.value;

                    if (!value) return;

                    const key = input.getAttribute('name').substr(11); // Extract the key
                    selectedDates[key] = value; // Add key-value pair to selectedDates object

                    const new_date = {new_date: value};

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: url + '/blocked-dates',
                        data: new_date,
                        success: function (response) {
                            console.log(response);
                            reloadDatesList();
                            // location.reload();
                            // Your success handling here
                        },
                        error: function (info) {
                            console.log('Error:', info);
                            // Your error handling here
                        },
                        beforeSend: function (a, b, c) {
                            input.nextElementSibling.classList.remove('hidden');
                        },
                        complete: function () {
                            input.nextElementSibling.classList.add('hidden');
                        },
                    });
                });

                // Perform a final AJAX request to send the entire selectedDates object
                $.ajax({
                    type: 'POST',
                    url: url + '/store-all-dates', // Replace with the appropriate URL
                    data: {dates: selectedDates, _token: $('meta[name="_token"]').attr('content')},
                    success: function (response) {
                        console.log('All dates stored successfully:', response);
                        reloadDatesList();
                        // location.reload();
                        // Any additional handling after storing all dates
                    },
                    error: function (info) {
                        console.log('Error storing all dates:', info);
                        // Error handling for storing all dates
                    },
                });
            });
// Get the ul element containing the list items
            var ulElement = document.querySelector('.js_list_blocked_dates');

// Convert list items to an array for sorting
            var listItems = Array.from(ulElement.querySelectorAll('li'));

// Sort list items based on the date value (assumes date format is "DD/MM/YYYY")
            listItems.sort(function (a, b) {
                var dateA = new Date(a.querySelector('[name="blockedDate"]').value.split('/').reverse().join('/'));
                var dateB = new Date(b.querySelector('[name="blockedDate"]').value.split('/').reverse().join('/'));
                return dateA - dateB; // Sort in descending order
            });

// Reorder the list items in the ul element
            listItems.forEach(function (li) {
                ulElement.appendChild(li);
            });


            const deleteHtmlItems = (item) => {
                item?.remove();

                // const listSelectedDates = document.querySelector( '.calendar__add_date_list' );
                // if ( listSelectedDates ) {
                //     listSelectedDates.innerHTML = '';
                // }
            }
        });
        var url = $('#url').val();

        function reloadDatesList() {
            $.ajax({
                type: 'GET',
                url: url + '/get-updated-dates-list', // Adjust the URL to your route
                success: function (response) {
                    // Replace the content of #datesListDiv with updated content
                    $('.calendar__container').html(response);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        $(document).on('submit', '.delete-form', function (event) {

            event.preventDefault(); // Prevent default form submission behavior

            var form = this;
            var blockedDate = $(form).find('input[name="blockedDate"]').val(); // Get the blocked date from the form

            $.ajax({
                type: 'DELETE', // Use POST method since you are deleting
                url: url + '/delete-by-date', // Adjust the route URL
                data: {
                    blockedDate: blockedDate, // Send the blocked date to the server
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response.message);
                    // Perform any updates to the UI as needed
                    // For example, remove the deleted <li> element
                    console.log(response);
                    $(form).closest('li').remove();
                    reloadDatesList();
                    // location.reload();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    </script>
@endif

</body>
</html>
