/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
// noinspection JSUnresolvedFunction

//import './bootstrap';
//import jQuery from 'jquery';
// import './navbar/fastclick';
// import './navbar/fixed-responsive-nav';
// import './navbar/responsive-nav';
// import './navbar/scroll';
// import 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js';
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
  $('.wrapper_front_calendar.wrapper_calendar_0 .calendar_date').click(function () {
    var selectedDate = $(this).data('calendar-date');
    var formattedDate = formatDate(selectedDate); // Convert the date format
    $('#order_pick_up_date').val(formattedDate);
    $('.wrapper_front_calendar.wrapper_calendar_0').toggleClass('hide'); // Close the table (you might need a better selector)
  });

  $('.wrapper_front_calendar.wrapper_calendar_1 .calendar_date').click(function () {
    var selectedDate = $(this).data('calendar-date');
    var formattedDate = formatDate(selectedDate); // Convert the date format
    $('#order_drop_off_date').val(formattedDate);
    $('.wrapper_front_calendar.wrapper_calendar_1').toggleClass('hide'); // Close the table (you might need a better selector)
  });

  function formatDate(inputDate) {
    var parts = inputDate.split('/');
    var year = parts[2];
    var month = parts[1];
    var day = parts[0];
    return year + '-' + month + '-' + day;
  }
  jQuery('#orderForm').submit(function (e) {
    e.preventDefault(); // Prevent form submission

    // Get form data
    var formData = $(this).serializeArray();
    var selectedCar = $('#order_car_select').val();
    function getValueByName(name) {
      for (var i = 0; i < formData.length; i++) {
        if (formData[i].name === name) {
          return formData[i].value;
        }
      }
      // Return null or a default value if the name is not found in the formData array
      return null;
    }
    var car_select = '';
    if (getValueByName('order_car_select') === 1) {
      car_select = 'samochód osobowy';
    } else if (getValueByName('order_car_select') === 2) {
      car_select = 'samochód dostawczy';
    } else {
      car_select = 'SUV / VAN';
    }
    // Create an empty string to store the HTML markup
    $('input#checkout_car').val(getValueByName('order_car_select'));
    $('#checkout_car_desc').html(car_select);

    // Wrap the email value in a div tag with a specific style
    $('input#checkout_pick_up_date').val(getValueByName("order_pick_up_date"));
    $('#checkout_pick_up_date_desc').html(getValueByName("order_pick_up_date"));

    // Wrap the name value in a b tag
    $('input#checkout_pick_up_time').val(getValueByName("order_pick_up_time"));
    $('#checkout_pick_up_time_desc').html(getValueByName("order_pick_up_time"));

    // Wrap the name value in a b tag
    $('input#checkout_drop_off_date').val(getValueByName("order_drop_off_date"));
    $('span#checkout_drop_off_date_desc').html(getValueByName("order_drop_off_date"));

    // Wrap the name value in a b tag
    $('input#checkout_drop_off_time').val(getValueByName("order_drop_off_time"));
    $('#checkout_drop_off_time_desc').html(getValueByName("order_drop_off_time"));

    // Wrap the name value in a b tag
    $('input#checkout_phone').val(getValueByName('client_phone'));
    $('#checkout_phone_desc').html(getValueByName('client_phone'));

    // Wrap the name value in a b tag
    $('input#checkout_email').val(getValueByName('client_email'));
    $('#checkout_email_desc').html(getValueByName('client_email'));
    $('#checkout_location_desc').html("54-530 Wrocław, ul. Skarżyńskiego 2");
    $('input#checkout_location').val("54-530 Wrocław, ul. Skarżyńskiego 2");
    function calculateDaysDifference(startDate, startTime, endDate, endTime) {
      // Combine the date and time values into ISO 8601 format
      var startDateTime = moment(startDate + ' ' + startTime, 'YYYY-MM-DD HH:mm:ss');
      var endDateTime = moment(endDate + ' ' + endTime, 'YYYY-MM-DD HH:mm:ss');

      // Calculate the difference in days
      var daysDifference = endDateTime.diff(startDateTime, 'days');
      var days = (endDateTime - startDateTime) / (1000 * 60 * 60 * 24);
      // Round the difference to the nearest whole number
      return Math.ceil(days);
    }

    // Example usage
    var startDate = getValueByName("order_pick_up_date");
    var startTime = getValueByName("order_pick_up_time");
    var endDate = getValueByName("order_drop_off_date");
    var endTime = getValueByName("order_drop_off_time");
    var daysDifference = calculateDaysDifference(startDate, startTime, endDate, endTime);
    $('input#checkout_days').val(daysDifference);
    $('#checkout_days_desc').html(daysDifference);
    var boxContentElements = $('.box_content');

    // Create an empty object to store the key-value pairs
    var pricesObj = {};

    // Loop through each box_content element
    boxContentElements.each(function () {
      // Extract the values from h2 and h4 elements
      var days = $(this).find('h2').text();
      var price = $(this).find('h4').text();

      // Convert the price to a number without the "PLN" part
      // Add the key-value pair to the object
      pricesObj[days] = parseFloat(price.replace('PLN', '').trim());
    });
    var totalPrice = pricesObj[daysDifference];

    // Check if the differenceDays is greater than 15
    if (daysDifference > 15) {
      // Calculate the additional days beyond 15
      var additionalDays = daysDifference - 15;

      // Get the price for 15 days from the pricesObj
      var priceFor15Days = pricesObj['15'];

      // Calculate the additional price for the extra days (additionalDays * 10)
      var additionalPrice = additionalDays * 10;

      // Add the additional price to the total price (use priceFor15Days as the default price)
      totalPrice = priceFor15Days + additionalPrice;
    }
    $('#checkout_price').val(totalPrice);
    $('#checkout_price_desc').html(totalPrice + 'PLN');
    // Show the modal
    $('#checkoutModal').modal('show');
  });
  $('#checkout_cancel_btn').on('click', function (e) {
    e.preventDefault();
    $('#form_checkout input[type="text"]').val('');
  });
  $('#form_checkout').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // Get the date and time values from the input fields
    var startDate = $('#checkout_pick_up_date').val();
    var startTime = $('#checkout_pick_up_time').val();
    var endDate = $('#checkout_drop_off_date').val();
    var endTime = $('#checkout_drop_off_time').val();
    var selectedCountPeoples = $('#checkout_people').val();
    var selectedCarType = $('#checkout_car').val();

    // Combine the date and time values into a single DateTime string

    var combinedStartDateTime = moment(startDate + ' ' + startTime, 'YYYY-MM-DD HH:mm').format('YYYY-MM-DD HH:mm:ss');
    var combinedEndDateTime = moment(endDate + ' ' + endTime, 'YYYY-MM-DD HH:mm').format('YYYY-MM-DD HH:mm:ss');

    // Create the data object to send in the AJAX request
    var data = {
      // '_token': token,
      // Include other form data as needed
      arrival: combinedStartDateTime,
      departure: combinedEndDateTime,
      number_days: $('input#checkout_days').val(),
      price: $('#checkout_price_desc').text(),
      number_peoples: selectedCountPeoples,
      client_name: $('input#checkout_firstname').val(),
      client_surname: $('input#checkout_lastname').val(),
      phone_number: $('input#checkout_phone').val(),
      email: $('input#checkout_email').val(),
      type_car: $('input#checkout_car').val(),
      car_mark: $('input#checkout_car_brand').val(),
      car_model: $('input#checkout_car_model').val(),
      car_number: $('input#checkout_plate').val()
    };
    // console.log(data);
    $.ajax({
      url: '/submit-order',
      // Replace with your backend URL
      method: 'POST',
      data: data,
      dataType: 'json',
      success: function success(data) {
        $('#form_checkout')[0].reset(); // Reset the form
        $('#orderForm')[0].reset(); // Reset the form
        $('#checkoutModal').modal('hide');
      },
      error: function error(xhr, status, _error) {
        // Handle errors for the AJAX request
        console.error(_error);
      }
    });
  });
  /*
          * Validate Order Form
          */
  var errorText = 'To pole jest obowiązkowe';
  function checkFieldsNotEmpty(event) {
    var allFieldsNotEmpty = true;
    $('#orderForm input').each(function () {
      if ($(this).val().trim() === '') {
        allFieldsNotEmpty = false;
        $(this).addClass('error-border');
        $('#validation_' + this.id).text(errorText);
      } else {
        $(this).removeClass('error-border');
        $('#validation_' + this.id).text('');
      }
    });
    return allFieldsNotEmpty;
  }
  $('#orderForm input').on('click', function () {
    $(this).removeClass('error-border');
    $('#validation_' + this.id).text('');
    $('#order_submit_btn').prop('disabled', false);
  });
  $('#order_submit_btn').addClass('disabled').prop('disabled', false).on('click', function (e) {
    if (checkFieldsNotEmpty()) {
      $('#order_submit_btn').prop('disabled', false);
    } else {
      $('#order_submit_btn').prop('disabled', true);
    }
  });
  // - Validate Order Form

  /*
   * Validate Form Checkout
   */
  $('#checkout_submit_btn').prop('disabled', true);
  $('#checkout_approval_1').on('change', function (e) {
    if (e.target.checked) {
      $('#checkout_submit_btn').prop('disabled', false).removeClass('disabled');
    } else {
      $('#checkout_submit_btn').prop('disabled', true).addClass('disabled');
    }
  });
  // - Validate Form Checkout

  $('#form_contact').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Create the data object to send in the AJAX request
    var formData = {
      // '_token': token,
      // Include other form data as needed
      contact_first_name: $('input#contact_firstname').val(),
      contact_last_name: $('input#contact_lastname').val(),
      contact_phone: $('input#contact_phone').val(),
      contact_email: $('#contact_email').val(),
      contact_message: $('textarea#contact_message').val()
    };
    // console.log(data);
    $.ajax({
      type: 'POST',
      url: '/send-contact',
      data: formData,
      success: function success(response) {
        console.log(response.message);
        console.log(formData);
        // Display success message or perform other actions
      },

      error: function error(_error2) {
        console.error(_error2);
        // Display error message or perform other actions
      }
    });
  });

  var windowWidth = jQuery(window).width();
  if (windowWidth > 1240) {
    var lastScrollTop = 0;
    var headerHeight = $('.top-header').outerHeight();
    $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();

      // Check if the user is scrolling down
      if (scrollTop > lastScrollTop) {
        $('.top-header').hide();
        $('.logo img').css('width', '80%');
      } else {
        // Check if the user is back at the top
        if (scrollTop <= headerHeight) {
          $('.top-header').show();
          $('.logo img').css('width', '100%');
        }
      }
      lastScrollTop = scrollTop;
    });
  }
  $(document).ready(function () {
    // Toggle the active class when clicking on a trigger element (e.g., a button or link)
    $('#language-switch-dropdown').click(function () {
      $('ul#countries').toggleClass('active');
    });
  });
});
jQuery(window).on('load', function () {
  $('.scrollup, .navbar-brand').click(function () {
    var new_hash = $(this).attr('href');
    $("html, body").animate({
      scrollTop: 0
    }, 'slow', function () {
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
    $('html, body').animate({
      scrollTop: $(marker).offset().top - scrollOffset
    }, 'slow');
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
      $('html, body').animate({
        scrollTop: g.top - h_scrollOffset
      }, 'slow');
    } else {
      console.log('no hash offset');
    }
  } else {
    console.log('no hash');
  }
});
$(document).ready(function () {
  $('.show-button').click(function () {
    var container = $('#regulamin');
    var content = $('#regulamin .row');
    var button = $(this);
    var isExpanded = container.hasClass('expanded');
    $('#terms').toggleClass('open');
    content.toggleClass('expanded');
    $(this).find('span').text(function (i, text) {
      return text === 'rozwijać się' ? 'zwijać się' : 'rozwijać się';
    });
  });
});
$(document).ready(function () {
  $('#myCheckbox').change(function () {
    if ($(this).is(':checked')) {
      $('#submitButton').prop('disabled', false); // Enable the submit button
    } else {
      $('#submitButton').prop('disabled', true); // Disable the submit button
    }
  });

  $('#agree').change(function () {
    if ($(this).is(':checked')) {
      $('#newsletter_submit_btn').prop('disabled', false); // Enable the submit button
    } else {
      $('#newsletter_submit_btn').prop('disabled', true); // Disable the submit button
    }
  });
});

$(document).ready(function () {
  $('.contacts-us-checkbox').change(function () {
    var allChecked = $('.contacts-us-checkbox').filter(':checked').length === 2;
    $('#contact_submit_btn').prop('disabled', !allChecked);
  });
  $('#newsletter_approval_rodo_link_more').on('click', function (e) {
    e.preventDefault();
    $('#newsletter_approval_rodo_more').toggleClass('isHide');
    $(this).text(function (i, text) {
      return text === 'rozwiń' ? 'zwiń' : 'rozwiń';
    });
  });
  $('#checkout_approval_rodo_link_more').on('click', function (e) {
    e.preventDefault();
    $('#checkout_approval_rodo_more').toggleClass('isHide');
    $(this).text(function (i, text) {
      return text === 'rozwiń' ? 'zwiń' : 'rozwiń';
    });
  });
  $('#contact_approval_rodo_link_more').on('click', function (e) {
    e.preventDefault();
    $('#contact_approval_rodo_more').toggleClass('isHide');
    $(this).text(function (i, text) {
      return text === 'rozwiń' ? 'zwiń' : 'rozwiń';
    });
  });
});
/******/ })()
;