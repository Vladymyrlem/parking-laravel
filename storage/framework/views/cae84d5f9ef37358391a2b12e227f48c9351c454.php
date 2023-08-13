<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jsCalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/calendar.css')); ?>">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/navbar/responsive-nav.js')); ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">

    <?php echo $__env->yieldContent('styles'); ?>
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
        <a href="/admin" class="brand-link logo">
            <img src="<?php echo e(asset('images/parking-logo.png')); ?>"
                 alt="Parking Rondo Logo"
                 class="brand-image"
                 style="opacity: 1">
        </a>
        <nav class="nav-collapse nav-collapse-0 closed" style="transition: max-height 284ms ease 0s;
position: relative;" aria-hidden="true">
            <ul>
                <li class="menu-item"><a class="nav-link scroll-to" href="#orders-table" data-scroll>Start</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#about-us" data-scroll>O Nas</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#prices" data-scroll>Cennik</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#info" data-scroll>Info</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#reviews" data-scroll>Reviews</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#contacts" data-scroll>Kontakt</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#titles" data-scroll>Section Titles</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#services" data-scroll>Services</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#titles" data-scroll>Section Titles</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#text-content" data-scroll>Text Content</a></li>
                <li class="menu-item"><a class="nav-link scroll-to" href="#calendar" data-scroll>Calendar</a></li>
            </ul>
        </nav>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <?php echo e(Auth::user()->name); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="<?php echo e(route('profile.show')); ?>" class="dropdown-item">
                        <i class="mr-2 fas fa-file"></i>
                        <?php echo e(__('My profile')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mr-2 fas fa-sign-out-alt"></i>
                            <?php echo e(__('Log Out')); ?>

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
            <img src="<?php echo e(asset('images/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        
        
        
        
        
        
        
        
        
        
        
        
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
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
<script type="text/javascript" src="<?php echo e(asset('js/jsCalendar/jsCalendar.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jsCalendar/jsCalendar.lang.pl.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/admin.js')); ?>"></script>
<script src="<?php echo e(mix('js/ajaxscript.js')); ?>"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('js/adminlte.min.js')); ?>" defer></script>

<?php echo $__env->yieldContent('scripts'); ?>
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="<?php echo e(\Request::url()); ?>">

<!-- MODAL SECTION -->
<!-- Head Block Modal-->
<?php echo $__env->make('partials.modal.head-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.modal.services-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('partials.modal.about-us-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Reviews Modal-->
<?php echo $__env->make('partials.modal.review-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Contacts Modal-->
<?php echo $__env->make('partials.modal.contacts-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Section title Modal-->
<?php echo $__env->make('partials.modal.section-title-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.modal.newsletter-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables/jquery.datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/navbar/fastclick.js')); ?>" async></script>
<script src="<?php echo e(asset('js/navbar/scroll.js')); ?>" async></script>
<script src="<?php echo e(asset('js/navbar/fixed-responsive-nav.js')); ?>" async></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    const headerTable = $('#headerTable');
    const toggleButton = $('#toggleRowsButton');

    // Initial state: Show only one row
    headerTable.find('tbody tr').not(':first').hide();

    toggleButton.on('click', function () {
        const hiddenRows = headerTable.find('tbody tr').not(':visible');

        if (hiddenRows.length > 0) {
            // Show all rows
            hiddenRows.show();
            toggleButton.text('Show Only One Row');
        } else {
            // Show only one row
            headerTable.find('tbody tr').not(':first').hide();
            toggleButton.text('Show All Rows');
        }
    });


    function dateSort(a, b) {
        var aDate = new Date(a);
        var bDate = new Date(b);
        return aDate - bDate;
    }

    $('#parkingTable').bootstrapTable({
        locale: 'pl',
        toolbar: '.toolbar'
    });
    $('.delete-btn').on('click', function () {
        var orderId = $(this).data('order-id');

        $.ajax({
            url: '/admin/delete-order/' + orderId, // Replace with your delete route URL
            type: 'DELETE',
            dataType: 'json',
            success: function (response) {
                // Remove the deleted row from the table
                $('#parkingTable').bootstrapTable('remove', {field: 'id', values: [orderId]});
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
    var todayDate = new Date().toISOString().slice(0, 10);
    $('#b1').click(function () {
        $('#parkingTable').bootstrapTable('filterBy', {
            arrivalh: [todayDate]
        });
    });
    $('#b2').click(function () {
        $('#parkingTable').bootstrapTable('filterBy', {
            departureh: [todayDate]
        });
    });
    $('#b3').click(function () {
        $('#parkingTable').bootstrapTable('filterBy', {
            createdh: [todayDate]
        });
    });

    function formatDate(date) {
        var year = date.getFullYear();
        var month = String(date.getMonth() + 1).padStart(2, '0');
        var day = String(date.getDate()).padStart(2, '0');
        return year + '-' + month + '-' + day;
    }

    $('#b4').click(function () {
        var todayDate = new Date(); // Current date
        var oneWeekAgo = new Date(todayDate);
        oneWeekAgo.setDate(todayDate.getDate() - 7); // Subtract 7 days

        var oneYearAgo = new Date(todayDate);
        oneYearAgo.setFullYear(todayDate.getFullYear() - 1); // Subtract 1 year

        var customStartDate = new Date(todayDate);
        customStartDate.setDate(todayDate.getDate() - 7); // Subtract 7 days
        customStartDate.setFullYear(todayDate.getFullYear() - 1); // Subtract 1 year

        var dateArray = [];
        var currentDate = new Date(customStartDate);
        // console.log(customStartDate);

        // Generate an array of dates starting from customStartDate up to oneWeekAgo
        while (currentDate <= oneWeekAgo) {
            dateArray.push(formatDate(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }
        // console.log(dateArray);
        $('#parkingTable').bootstrapTable('filterBy', {
            createdh: dateArray
        });
    });


    $('#sortByToday').on('click', function () {
        $('#parkingTable').bootstrapTable('filterBy', {
            arrival: [todayDate]
        });
    });
    $('#resetFilters').on('click', function () {
        $('#parkingTable').bootstrapTable('destroy');
        $('#parkingTable').bootstrapTable({
            toolbar: '#customToolbar'
        });
    });


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
<?php if(isset($arrayData)): ?>
<?php endif; ?>
<script>
    jQuery(function ($) {
        const url = $('#url').val();

        window.filterDatesFromToday = function (dates) {
            const today = new Date().setHours(0, 0, 0, 0);

            return dates
                .filter(dateStr => {
                    const [day, month, year] = dateStr.new_date.split('/');
                    const date = new Date(`${year}-${month}-${day}`);
                    return date >= today - 1;
                })
                .sort((a, b) => {
                    var dateA = new Date(a.new_date.split('/').reverse().join('/'));
                    var dateB = new Date(b.new_date.split('/').reverse().join('/'));
                    return dateA - dateB;
                });
        }

        window.fData = filterDatesFromToday( <?php echo json_encode($arrayData); ?> );

        window.calendarMain = new CalendarIk({
            dates: window.fData,
            calendarWrapperClass: '.calendar__main_calendar',
        });

        window.datesList = new DatesList({
            dates: window.fData,
            calendar: window.calendarMain.calendar,
            dateListClass: 'calendar__date_list',
        });


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

                // SAVE
                $.ajax({
                    type: 'POST',
                    url: url + '/blocked-dates',
                    data: new_date,
                    success: function (response) {
                        console.log(response);
                        reloadDatesList();
                    },
                    error: function (info) {
                        console.log('Error:', info);
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
                    console.log(response);
                    reloadDatesList();
                },
                error: function (info) {
                    console.log('Error storing all dates:', info);
                },
            });
        });


        /*
         * RELOAD DATES
         */
        function reloadDatesList() {

            $.ajax({
                type: 'GET',
                url: url + '/get-updated-dates-list',
                success: function (response) {
                    if (response.success) {

                        window.fData = window.filterDatesFromToday(response.data.map(d => ({new_date: d})));

                        window.calendarMain.dates = window.fData;
                        window.calendarMain.calendar.refresh();

                        Array.from(document.querySelectorAll('.js_list_blocked_dates li'))
                            .forEach(elem => elem.remove());

                        Array.from(document.querySelectorAll('.calendar__add_date_list li'))
                            .forEach(elem => elem.remove());

                        window.datesList.dates = window.fData;
                        window.datesList.listDatesRender();
                    }
                    console.log(response);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }


        /*
         * DELETE DATE
         */
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
                    reloadDatesList();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

    });
</script>


</body>
</html>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/layouts/app.blade.php ENDPATH**/ ?>