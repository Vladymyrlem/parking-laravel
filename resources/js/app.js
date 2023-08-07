// noinspection JSUnresolvedFunction

import './bootstrap';
import jQuery from 'jquery';
import slick from './slick';
// import './navbar/fastclick';
// import './navbar/fixed-responsive-nav';
// import './navbar/responsive-nav';
// import './navbar/scroll';

window.$ = jQuery;
jQuery(function () {
    $(window).scroll(function () {
        var sections = $('section'); // Assuming your sections have the 'section' selector
        var navLinks = $('.nav-link'); // Assuming your menu links have the 'nav-link' class

        sections.each(function () {
            var sectionTop = $(this).offset().top - 50; // Adjust 50 to your preference for offset
            var sectionBottom = sectionTop + $(this).outerHeight();

            if ($(window).scrollTop() >= sectionTop && $(window).scrollTop() <= sectionBottom) {
                // Remove active class from all menu links
                navLinks.removeClass('active');

                // Find the corresponding menu link based on the section ID and add the active class
                var currentSectionId = $(this).attr('id');
                $('a[href="#' + currentSectionId + '"]').addClass('active');
            }
        });
    });
    jQuery('#orderForm').submit(function (e) {
        e.preventDefault(); // Prevent form submission

        // Get form data
        var formData = $(this).serializeArray();
        var selectedCar = $('#order_car_select').val();

        // Create an empty string to store the HTML markup
        formData.forEach(function (data) {
            if (data.name === 'order_pick_up_date') {
                // Wrap the email value in a div tag with a specific style
                $('input#checkout_pick_up_date').val(data.value);
            }
            if (data.name === 'order_pick_up_time') {
                // Wrap the name value in a b tag
                $('input#checkout_pick_up_time').val(data.value);
            }
            if (data.name === 'order_drop_off_date') {
                // Wrap the name value in a b tag
                $('input#checkout_pick_up_time').val(data.value);
            }
            if (data.name === 'order_drop_off_time') {
                // Wrap the name value in a b tag
                $('input#checkout_pick_up_time').val(data.value);
            }
            if (data.name === 'client_phone') {
                // Wrap the name value in a b tag
                $('input#checkout_phone').val(data.value);
            }
            if (data.name === 'client_email') {
                // Wrap the name value in a b tag
                $('input#checkout_email').val(data.value);
            }
            // Add other conditions for additional fields if needed
        });

        // Show the modal
        $('#checkoutModal').modal('show');
    });

    $("#headblockCarousel").slick({
        dots: true,
        infinite: false,
        variableWidth: false,
        centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
    });
    $("#reviews-carousel").slick({
        dots: true,
        infinite: false,
        variableWidth: false,
        variableHeight: true,
        centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
});

$(document).ready(function () {
    // Get all ol elements with class 'days'
    const olElements = $('ol.days');
    // var url = $('#url').val();
    //
    // var modifiedUrl = url + '/reservation-dates'
    // // Fetch reservation dates from the backend using jQuery AJAX
    // $.ajax({
    //     url: modifiedUrl, // Update the route here
    //     type: 'GET',
    //     success: function (data) {
    //         var datesArray = [];
    //         $.each(data, function (index, value) {
    //             datesArray.push(value.new_date);
    //         });
    //         console.log(datesArray);
    //
    //         // Loop through each ol element and its li elements
    //         olElements.each(function () {
    //             const liElements = $(this).find('li');
    //             console.log(liElements);
    //
    //             // Loop through each li element and check if its data-calendar-day attribute matches any date from the database
    //             liElements.each(function () {
    //                 const calendarDay = $(this).attr('data-calendar-day');
    //                 if (datesArray.includes(calendarDay)) {
    //                     $(this).addClass('block-date');
    //                 }
    //             });
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         // console.error('Error fetching reservation dates:', error);
    //         console.log(JSON.stringify(error));
    //     }
    // });

});
jQuery(window).on('load', function () {

    $('.scrollup, .navbar-brand').click(function () {
        var new_hash = $(this).attr('href');
        $("html, body").animate({scrollTop: 0}, 'slow', function () {
            $("nav li a").removeClass('active');
            var hash = $(location).attr('hash');
            if (!hash) {
                var new_anchor = $(location).attr('href') + new_hash;
            } else {
                var new_anchor = $(location).attr('href').replace(hash, new_hash);
            }
            $(location).attr('href', new_anchor);
        });
        return false;
    });

    $(".scroll-to").click(function (event) {
        $('.modal').modal('hide');
        var position = $(document).scrollTop();
        var scrollOffset = 110;
        if (position < 39) {
            scrollOffset = 260;
        }
        var marker = $(this).attr('href');
        console.log(marker);
        $('html, body').animate({scrollTop: $(marker).offset().top - scrollOffset}, 'slow');

        var hash = $(location).attr('hash');
        if (!hash) {
            var new_anchor = $(location).attr('href') + marker;
        } else {
            var new_anchor = $(location).attr('href').replace(hash, marker);
        }
        $(location).attr('href', new_anchor);

        return false;
    });

    var hash = $(location).attr('hash');
    if (hash) {
        console.log('hash: ' + hash);
        var g = $(hash).offset();
        if (g) {
            console.log('hash top: ' + g.top);
            var h_position = $(document).scrollTop();
            console.log('h position: ' + h_position);
            var h_scrollOffset = 300;
            $('html, body').animate({scrollTop: g.top - h_scrollOffset}, 'slow');
        } else {
            console.log('no hash offset');
        }
    } else {
        console.log('no hash');
    }


});
