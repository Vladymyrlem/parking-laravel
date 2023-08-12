<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Parking Rondo'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.css','resources/sass/style.scss','resources/css/calendar.css','resources/css/slick.css','resources/css/slick-theme.css']); ?>
    <?php echo $__env->yieldContent('styles'); ?>


</head>
<body>
<div id="app">
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a href="<?php echo e(url('/')); ?>" class="navbar-brand"><?php echo e(config('app.name', 'Laravel')); ?></a>

            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" id="searchForm" action="#" method="GET">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <!-- Other Navbar items -->
            <!-- ... -->

        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>


<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>

<script>
    jQuery(function () {

        var data = [];
        // var disableddates = ['26/07/2023', '27/07/2023', '28/07/2023', '29/07/2023', '30/07/2023', '31/07/2023', '01/08/2023', '02/08/2023', '03/08/2023', '04/08/2023', '05/08/2023', '06/08/2023',];

        $('#tdd').calendar({
            zIndex: 999,
            date: new Date(),
            selectedRang: [new Date()]
        }).show();

        var $doff = $('#doff');
        var UID = 1;
        var url = $('#url').val();

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
    });
</script>
</body>
</html>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/layouts/master.blade.php ENDPATH**/ ?>