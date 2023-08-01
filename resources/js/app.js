// noinspection JSUnresolvedFunction

import './bootstrap';
import jQuery from 'jquery';
import slick from './slick';

window.$ = jQuery;
jQuery(function () {
    jQuery('#myForm').submit(function (e) {
        e.preventDefault(); // Prevent form submission

        // Get form data
        var formData = $(this).serializeArray();

        // Create an empty string to store the HTML markup
        formData.forEach(function (data) {
            if (data.name === 'order_pick_up_date') {
                // Wrap the email value in a div tag with a specific style
                $('input#pick-up-date').val(data.value);
            }
            if (data.name === 'order_pick_up_time') {
                // Wrap the name value in a b tag
                $('input#pick-up-time').val(data.value);
            }
            // Add other conditions for additional fields if needed
        });

        // Show the modal
        $('#myModal').modal('show');
    });

    $("#headblockCarousel").slick({
        dots: true,
        infinite: false,
        variableWidth: false,
        centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1
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
