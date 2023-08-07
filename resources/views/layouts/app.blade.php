<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('css/jsCalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jsCalendar_general.css') }}">

    <link href="css/jsCalendar.min.css" rel="stylesheet">
    <link href="../../css/jsCalendar_general.css" rel="stylesheet">


    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    @yield('styles')
    <style>
        .hidden-textarea {
            position: absolute;
            top: -9999px;
            left: -9999px;
            width: 1px;
            height: 1px;
            opacity: 0;
        }
    </style>

</head>
<body class="hold-transition sidebar-collapse">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <a href="/" class="brand-link">
            <img src="{{ asset('images/parking-logo.png') }}" alt="Parking Rondo Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: 1">
        </a>
        <a data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

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
    </nav>
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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
<script>
    @if(isset($arrayData))
    jQuery(function () {
            var url = $('#url').val();

            var disabledDates = <?php echo json_encode($arrayData); ?>;

            // Now 'dataArray' contains the array values in JavaScript format
            var data = [];
            // var disabledDates = [ '01/08/2023', '02/08/2023', '03/08/2023', '04/08/2023' ];
            // var disabledDates = [ {new_date: '01/08/2023'}, {new_date: '02/08/2023'}, {new_date: '03/08/2023'} ];

            const cal = $('#tdd').calendar({
                zIndex: 999,
                date: new Date(),
                disabledDates,
                // separator: '.'

            }).show().data('calendar');

            // cal.getDayAction();


        var calendarInstance1 = calendarJs( "calendar_js", {
            manualEditingEnabled: true,


        } );



        console.log(disabledDates)


            var myList = document.querySelector('.calendar-views .days');
            var listItems = myList.getElementsByTagName('li');

            for (var i = 0; i < listItems.length; i++) {
                var listItem = listItems[i];
                var value = parseInt(listItem.getAttribute('value'));
                if (dataArray.includes(value)) {
                    listItem.classList.add('disabled');
                }
            }
            var $doff = $('#doff');
            var UID = 1;
            {{--var table = $('#datatable-ajax-crud');--}}
            {{--var siteUrl = "{{ url('/') }}";--}}
            {{--if (!table.DataTable().data().any()) {--}}
            {{--    table.DataTable({--}}
            {{--        processing: true,--}}
            {{--        serverSide: true,--}}
            {{--        ajax: "/admin/services",--}}
            {{--        columns: [--}}
            {{--            {data: 'id', name: 'id', 'visible': false},--}}
            {{--            {data: 'service_title', name: 'services_title'},--}}
            {{--            {data: 'service_content', name: 'service_content'},--}}
            {{--            {--}}
            {{--                data: 'service_icon',--}}
            {{--                name: 'service_icon',--}}
            {{--                render: function (data, type, full, meta) {--}}
            {{--                    // 'data' is the value of 'service_icon' from the database--}}
            {{--                    // type, full, and meta can be used to handle different scenarios if needed--}}
            {{--                    var imageUrl = "/" + data;--}}
            {{--                    var imgTag = '<img src="' + imageUrl + '" alt="Service Icon" height="auto" width="auto">';--}}
            {{--                }--}}
            {{--            },--}}
            {{--            {data: 'created_at', name: 'created_at'},--}}
            {{--            {data: 'action', name: 'action', orderable: false},--}}
            {{--        ],--}}
            {{--        order: [[0, 'desc']]--}}
            {{--    });--}}
            {{--}--}}
            // var modifiedUrl = url + '/reservations'
            //
            // // Fetch reserved dates from the backend using AJAX
            // function fetchReservedDates() {
            //     // Replace 'your_endpoint_url' with the actual endpoint URL to fetch the reserved dates
            //     $.ajax({
            //         type: "GET",
            //         url: modifiedUrl,
            //         success: function (data) {
            //             // Call the function to add the calendar with reserved dates
            //             addCalendarWithReservedDates(data.reservedDates);
            //         },
            //         error: function (error) {
            //             console.log('Error:', error);
            //         }
            //     });
            // }
            //
            // // Function to add the calendar with reserved dates
            // function addCalendarWithReservedDates(reservedDates) {
            //     $doff.append('<input class="calendar form-control form_element" placeholder="wybierz datę..." autocomplete="off" id="input-' + UID + '" name="daysoff[]"><div id="ca-' + UID + '"></div>');
            //     $('#ca-' + UID).calendar({
            //         zIndex: 999,
            //         date: new Date(),
            //         disableddates: reservedDates, // Set the reserved dates as disabled dates on the calendar
            //         selectedRang: [new Date()],
            //         data: data,
            //         trigger: '#input-' + UID++
            //     });
            // }
            //
            // // Add calendar input on button click
            // $('#add').click(function () {
            //     fetchReservedDates(); // Fetch the reserved dates from the backend and add the calendar
            // });
        }
    )
    ;
</script>
@endif
</body>
</html>
