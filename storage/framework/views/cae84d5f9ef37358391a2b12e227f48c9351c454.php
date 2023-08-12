<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/calendar.css')); ?>">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <?php echo $__env->yieldContent('styles'); ?>
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
            <img src="<?php echo e(asset('images/parking-logo.png')); ?>" alt="Parking Rondo Logo"
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
    </nav>
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
<!-- Reviews Modal-->
<?php echo $__env->make('partials.modal.review-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Contacts Modal-->
<?php echo $__env->make('partials.modal.contacts-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Section title Modal-->
<?php echo $__env->make('partials.modal.section-title-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<script src="<?php echo e(asset('js/datatables/jquery.datatables.min.js')); ?>"></script>

<script>
    <?php if(isset($arrayData)): ?>
    jQuery(function () {
            var url = $('#url').val();

            var dataArray = <?php echo json_encode($arrayData); ?>;
            // Now 'dataArray' contains the array values in JavaScript format
            //console.log(dataArray);
            var data = [];
            var disabledDates = ['26/7/2023', '27/7/2023', '28/7/2023', '29/7/2023', '30/7/2023', '31/7/2023', '01/9/2023', '02/9/2023', '03/9/2023', '04/9/2023', '05/9/2023', '06/9/2023',];

            $('#tdd').calendar({
                zIndex: 999,
                date: new Date(),
                disabledDates: dataArray,
                separator: '.'

            }).show();
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
<?php endif; ?>
</body>
</html>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/layouts/app.blade.php ENDPATH**/ ?>