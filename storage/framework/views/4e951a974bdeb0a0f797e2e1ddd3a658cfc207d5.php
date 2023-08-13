<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Parking Rondo'); ?></title>
    <!-- Fav and touch icons -->
    
    
    
    
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jsCalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/calendar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
    <script src="<?php echo e(asset('js/navbar/responsive-nav.js')); ?>"></script>
    <?php echo RecaptchaV3::initJs(); ?>


    <?php echo $__env->yieldContent('styles'); ?>

</head>
<body name="#start" id="top" class="js">
<!-- Top Navbar -->
<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="">
    <?php echo $__env->yieldContent('content'); ?>
</main>
<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="<?php echo e(asset('js/slick.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/navbar/fastclick.js')); ?>" async></script>
<script src="<?php echo e(asset('js/navbar/scroll.js')); ?>" async></script>
<script src="<?php echo e(asset('js/navbar/fixed-responsive-nav.js')); ?>" async></script>

<script type="text/javascript" src="<?php echo e(asset('js/jsCalendar/jsCalendar.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/jsCalendar/jsCalendar.lang.pl.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        jQuery("#headblockCarousel").slick({
            dots: true,
            infinite: false,
            variableWidth: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
        });
        jQuery("#reviews-carousel").slick({
            dots: true,
            infinite: false,
            variableWidth: false,
            variableHeight: true,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
        });
    });

</script>
<?php if(isset($blockedDates)): ?>
    
    <script type="text/javascript">
        $(document).ready(function () {
            window.$blockedDates = <?php echo json_encode($blockedDates); ?>;

            const orderForm = document.querySelector('#orderForm');
            const ofInputsIds = ['#order_pick_up_date', '#order_drop_off_date'];
            const ofWrapperCalendarClassName = 'order_form_wrapper_calendar';
            const ofHideCalendarClassName = 'hide';

            /*
                      * Create info text
                      */
            const textWrap = document.querySelector('#reservation-blocked-dates');
            if (textWrap) {
                textWrap.innerText = `${
                    $blockedDates
                        .filter(elem => {
                            const currDate = new Date(elem.new_date.split('/').reverse().join('/') + ' 0:0:0:0');
                            const date = new Date().setHours(0, 0, 0, 0);
                            return currDate >= date;
                        })
                        .map(elem => elem.new_date)
                        .join(', ')
                }`;
            }


            /*
             * Create Wrapper For Calendar
             */
            const ofWrapperCalendar = document.createElement('div');
            ofWrapperCalendar.classList.add(ofWrapperCalendarClassName);
            ofWrapperCalendar.classList.add(ofHideCalendarClassName);
            orderForm.append(ofWrapperCalendar);

            /*
             * Create Calendar
             */
            window.ofCalendar = new CalendarIk({
                dates: window.$blockedDates,
                calendarWrapperClass: '.' + ofWrapperCalendarClassName,
                ofInputDateFrom: document.querySelector(ofInputsIds[0]),
                ofInputDateTo: document.querySelector(ofInputsIds[1]),
            });

            /*
             * Create Events for Inputs
             */
            ofInputsIds.forEach((input, i) => {
                const $input = document.querySelector(input);
                if ($input) {

                    $input.setAttribute('data-input-id', i);
                    $input.setAttribute('readonly', 'readonly');

                    $input.addEventListener('click', e => {
                        e.preventDefault();

                        // Set Calendar position
                        const posForm = orderForm.getBoundingClientRect();
                        const posInput = e.target.getBoundingClientRect();
                        const posLeft = posInput.left - posForm.left + posInput.width;
                        const posTop = posInput.top - posForm.top;
                        ofCalendar.calendar._target.style.top = posTop + 'px';
                        ofCalendar.calendar._target.style.left = posLeft + 'px';

                        ofCalendar.calendar._target.classList.remove(ofHideCalendarClassName);
                        ofCalendar.ofInputActive = $input;
                        ofCalendar.ofInputActiveId = $input.dataset.inputId;
                        ofCalendar.calendar.refresh();
                        ofCalendar.setActionOnDateClick();
                    })
                }
            })

            /*
             * Close Calendars Click Out calendar
             */
            // hide Calendars
            ;(() => {
                document.addEventListener('click', event => {

                    if (!event.target.closest('.' + ofWrapperCalendarClassName)
                        &&
                        !event.target.closest(ofInputsIds[0])
                        &&
                        !event.target.closest(ofInputsIds[1])
                    ) {
                        ofCalendar.calendar._target.classList.add(ofHideCalendarClassName);
                    }
                })
            })();
        });
    </script>
<?php endif; ?>
<script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://maps.google.com/maps/api/js?language=pl&amp;key=AIzaSyBLNkjdXiMOY5qXrYFl5NickaHfDEGcmsA"></script>
<script src="<?php echo e(asset('js/gmap3.min.js')); ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).ready(function () {
        // Submit the form using Ajax
        $('#newsletter_submit_btn').click(function (event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const formData = {
                email: $('input#newsletter_email').val()
            }
            $.ajax({
                type: 'POST',
                url: '/subscribe',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(formData);
                    $('#successMessage').show();
                },
                error: function (error) {
                    console.log(error);
                    // Handle error response if needed
                }
            });
            // Get the reCAPTCHA response
            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('.navbar-toggler').click(function (e) {
            e.preventDefault();
            if (!$(this).hasClass('collapsed')) {
                $(this).addClass('collapsed');
            } else {
                $(this).removeClass('collapse');
            }
            $('.navbar-collapse').toggleClass('show');
        })

        var companyName = "PARKING RONDO";

        function loadMap(addressData) {

            var path = document.URL;
            path = path.substring(0, path.lastIndexOf("/") + 1)

            var locationContent = "<h2>" + companyName + "</h2><p>" + addressData.value + "</p>";

            var locationData = {
                map: {
                    options: {
                        center: [51.109251, 16.902584],
                        zoom: 14,
                        maxZoom: 18,
                        scrollwheel: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                        navigationControl: true,
                        scrollwheel: true,
                        streetViewControl: true
                    }
                },
                infowindow: {
                    options: {
                        content: locationContent
                    },
                    events: {
                        closeclick: function (infowindow) {
                            //alert("closing : " + infowindow.getContent());
                        }
                    }
                },
                marker: {
                    options: {
                        icon: new google.maps.MarkerImage(
                            path + "images/mapmarker.png",
                            new google.maps.Size(59, 58, "px", "px"),
                            new google.maps.Point(0, 0),    //sets the origin point of the icon
                            new google.maps.Point(29, 34)   //sets the anchor point for the icon
                        ),
                        draggable: false
                    },
                    events: {
                        click: function (marker) {

                        },
                        mouseover: function (marker, event, context) {
                            $(this).gmap3(
                                {clear: "overlay"},
                                {
                                    overlay: {
                                        latLng: marker.getPosition(),
                                        options: {
                                            content: ".",
                                            offset: {
                                                x: -50,
                                                y: -50
                                            }
                                        }
                                    }
                                });
                        },
                        mouseout: function () {
                            $(this).gmap3({clear: "overlay"});
                        }
                    }
                }
            };

            if ($.isEmptyObject(addressData.latLng)) {
                locationData.infowindow.address = addressData.value;
                locationData.marker.address = addressData.value;
            } else {
                locationData.infowindow.latLng = addressData.latLng;
                locationData.marker.latLng = addressData.latLng;
            }

            $('#locations .map').gmap3(locationData, "autofit");

        }

        var locations = [
            {value: "ul. Skarżyńskiego 2, 54-530 Wrocław", latLng: [51.109251, 16.902584]},
        ];
        loadMap(locations[0]);

        $("#location-map-select").append('<option value="' + locations[0].value + '">Please select a location</option>');
        $.each(locations, function (index, value) {
            //console.log(index);
            var option = '<option value="' + index + '">' + value.value + '</option>';
            $("#location-map-select").append(option);
        });

        $('#location-map-select').on('change', function () {
            $('#locations .map').gmap3('destroy');
            loadMap(locations[this.value]);
        });
        var url = $('#url').val();


    });

    var datesArray = <?php echo json_encode($blockedDates); ?>;

</script>
</body>
</html>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/layouts/master.blade.php ENDPATH**/ ?>