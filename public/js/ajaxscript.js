/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/ajax_query/about_us_ajax.js":
/*!**************************************************!*\
  !*** ./resources/js/ajax_query/about_us_ajax.js ***!
  \**************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/aboutus';
  //display modal form for creating new product *********************
  $('#btn_add_about_us').click(function () {
    $('#btn-save-about-us').val("add");
    $('#frmAboutUs').trigger("reset");
    $('#aboutusModal').modal('show');
  });
  $(document).on('click', '.close-head-editor', function () {
    $('#aboutusModal').modal('hide');
  });
  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_about_us_modal', function () {
    var aboutus_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + aboutus_id,
      success: function success(data) {
        console.log(data);
        $('#aboutus_id').val(data.id);
        $('#frmAboutUs #title').val(data.title);
        $('#frmAboutUs #content').val(data.content);
        $('#btn-save-about-us').val("update");
        $('#aboutusModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#btn-save-about-us").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var encodedText = encodeURIComponent($('#frmAboutUs #content').val());
    e.preventDefault();
    var formData = {
      title: $('#frmAboutUs #title').val(),
      content: encodedText
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-about-us').val();
    var type = "POST"; //for creating new resource
    var aboutus_id = $('#aboutus_id').val();
    ;
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + aboutus_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var product = '<tr id="aboutus' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + encodedText + '</td>';
        product += '<td><button class="btn btn-warning btn-detail open_about_us_modal" value="' + data.id + '">Edit</button>';
        product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#aboutus-list').append(product);
        } else {
          //if user updated an existing record
          $("#aboutus" + aboutus_id).replaceWith(product);
        }
        $('#frmAboutUs').trigger("reset");
        $('#aboutusModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-product', function () {
    var aboutus_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + aboutus_id,
      success: function success(data) {
        console.log(data);
        $("#aboutus" + aboutus_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/contacts_ajax.js":
/*!**************************************************!*\
  !*** ./resources/js/ajax_query/contacts_ajax.js ***!
  \**************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/contacts';
  //display modal form for creating new contact *********************
  $('#btn_add_contact').click(function () {
    $('#btn-save-contacts').val("add");
    $('#frmContactsBlock').trigger("reset");
    $('#contactsModal').modal('show');
  });
  $(document).on('click', '.close-contacts-editor', function () {
    $('#contactsModal').modal('hide');
  });
  //display modal form for contact EDIT ***************************
  $(document).on('click', '.open_contacts_modal', function () {
    var contact_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + contact_id,
      success: function success(data) {
        console.log(data);
        $('#contact_id').val(data.id);
        $('#contacts-title').val(data.contacts_title);
        $('#contact-email').val(data.email);
        $('#contact-address').val(data.address);
        $('#phone-1').val(data.phone_number_1);
        $('#phone-2').val(data.phone_number_2);
        $('#latitude').val(data.latitude);
        $('#longitude').val(data.longitude);
        $('#map-link').val(data.map_link);
        $('#btn-save-contacts').val("update");
        $('#contactsModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new contact / update existing contact ***************************
  $("#btn-save-contacts").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      contacts_title: $('#contacts-title').val(),
      email: $('#contact-email').val(),
      address: $('#contact-address').val(),
      phone_number_1: $('#phone-1').val(),
      phone_number_2: $('#phone-2').val(),
      latitude: $('#latitude').val(),
      longitude: $('#longitude').val(),
      map_link: $('#map-link').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-contacts').val();
    var type = "POST"; //for creating new resource
    var contact_id = $('#contact_id').val();
    ;
    var my_url = modifiedUrl;
    if (state === "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + contact_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var contact = '<tr id="contact' + data.id + '"><td>' + data.id + '</td><td>' + data.contacts_title + '</td><td>' + data.email + '</td><td>' + data.address + '</td>';
        contact += '<td>' + data.phone_number_1 + '</br>' + data.phone_number_2 + '</td><td>' + data.latitude + ' ' + data.longitude + '</td><td>' + data.map_link + '</td>';
        contact += '<td><button class="btn btn-warning btn-detail open_contact_modal" value="' + data.id + '">Edit</button>';
        contact += ' <button class="btn btn-danger btn-delete delete-contact" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#contacts-list').append(contact);
        } else {
          //if user updated an existing record
          $("#contact" + contact_id).replaceWith(contact);
        }
        $('#frmContactsBlock').trigger("reset");
        $('#contactsModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete contact and remove it from TABLE list ***************************
  // $(document).on('click', '.delete-contact', function () {
  //     var contact_id = $(this).val();
  //     $.ajaxSetup({
  //         headers: {
  //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  //         }
  //     })
  //     $.ajax({
  //         type: "DELETE",
  //         url: modifiedUrl + '/' + contact_id,
  //         success: function (data) {
  //             console.log(data);
  //             $("#contact" + contact_id).remove();
  //             location.reload();
  //         },
  //         error: function (data) {
  //             console.log('Error:', data);
  //         }
  //     });
  // });
});

/***/ }),

/***/ "./resources/js/ajax_query/header_ajax.js":
/*!************************************************!*\
  !*** ./resources/js/ajax_query/header_ajax.js ***!
  \************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/headblock';
  //display modal form for creating new product *********************
  $('#btn_add').click(function () {
    $('#btn-save').val("add");
    $('#frmHeadBlock').trigger("reset");
    $('#headModal').modal('show');
  });
  $(document).on('click', '.close-head-editor', function () {
    $('#headModal').modal('hide');
  });
  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_header_modal', function () {
    var headblock_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + headblock_id,
      success: function success(data) {
        console.log(data);
        $('#headblock_id').val(data.id);
        $('#title').val(data.title);
        $('#subtitle').val(data.subtitle);
        $('#btn-save').val("update");
        $('#headModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#btn-save").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      title: $('#title').val(),
      subtitle: $('#subtitle').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save').val();
    var type = "POST"; //for creating new resource
    var headblock_id = $('#headblock_id').val();
    ;
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + headblock_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var product = '<tr id="headblock' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.subtitle + '</td>';
        product += '<td><button class="btn btn-warning btn-detail open_header_modal" value="' + data.id + '">Edit</button>';
        product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#headblock-list').append(product);
        } else {
          //if user updated an existing record
          $("#headblock" + headblock_id).replaceWith(product);
        }
        $('#frmHeadBlock').trigger("reset");
        $('#headModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-product', function () {
    var headblock_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + headblock_id,
      success: function success(data) {
        console.log(data);
        $("#headblock" + headblock_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/information_ajax.js":
/*!*****************************************************!*\
  !*** ./resources/js/ajax_query/information_ajax.js ***!
  \*****************************************************/
/***/ (() => {

function scrollToBlock() {
  var targetOffset = $(".hide-edit-info-media").offset().top;
  // Smooth scroll to the target block
  $("html, body").animate({
    scrollTop: targetOffset
  }, 1000 // Adjust the duration of the scroll animation as needed
  );
}

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  var modifiedUrl = url + '/infos';
  //display modal form for creating new product *********************
  $('#btn_add_info').click(function () {
    $('#save-info').val("add");
    $('#frmInfoBlock').trigger("reset");
    $('.hide-edit-info-media').slideDown();
    scrollToBlock();
  });
  $(document).on('click', '.close-info-editor', function () {
    $(this).parent().css('display', 'none');
  });

  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_info', function () {
    var info_id = $(this).val();
    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + info_id,
      success: function success(data) {
        console.log(data);
        $('#info_id').val(data.id);
        // Check if the editors are initialized before setting the content
        if (tinymce.activeEditor && tinymce.get('description-editor')) {
          tinymce.get('description-editor').setContent(data.description);
        }
        if (tinymce.activeEditor && tinymce.get('media-editor')) {
          tinymce.get('media-editor').setContent(data.media);
        }
        $('#save-info').val("update");
        $('.hide-edit-info-media').slideDown();
        scrollToBlock();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#save-info").click(function (e) {
    e.preventDefault();
    var descriptionContent = tinymce.get('description-editor').getContent();
    var mediaContent = tinymce.get('media-editor').getContent();
    var formData = {
      description: descriptionContent,
      media: mediaContent
    };
    var state = $('#save-info').val();
    var type = "POST";
    var info_id = $('#info_id').val();
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT";
      my_url += '/' + info_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var descriptionContent = tinymce.get('description-editor').getContent();
        var mediaContent = tinymce.get('media-editor').getContent();
        var info = '<tr id="inforow' + data.id + '"><td>' + data.id + '</td><td>' + data.description + '</td><td>' + mediaContent + '</td>';
        info += '<td><button class="btn btn-warning btn-detail open_info" value="' + data.id + '">Edit Info</button>';
        info += ' <button class="btn btn-danger btn-delete delete-info" value="' + data.id + '">Delete Info</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#infos-list').append(info);
        } else {
          //if user updated an existing record
          $("#inforow" + info_id).replaceWith(info);
        }
        $('#infos-list').append(info);
        $('#frmInfoBlock').trigger("reset");
        $('.hide-edit-info-media').slideUp();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-info', function () {
    var info_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + info_id,
      success: function success(data) {
        console.log(data);
        $("#inforow" + info_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});
// $(document).ready(function () {
//
//     //get base URL *********************
//     var url = $('#url').val();
//
//     var modifiedUrl = url + '/infos/video'
//     //display modal form for creating new product *********************
//     $('#btn_add_info_video').click(function () {
//         $('#save-info-video').val("add");
//         $('#frmInfoVideoBlock').trigger("reset");
//         $('.hide-edit-info-video').slideDown();
//         scrollToBlockVideo();
//     });
//     $(document).on('click', '.close-info-editor', function () {
//         $(this).parent().css('display', 'none');
//     });
//
//
//     //display modal form for product EDIT ***************************
//     $(document).on('click', '.open_info_video', function () {
//         var info_id = $(this).val();
//         // Populate Data in Edit Modal Form
//         $.ajax({
//             type: "GET",
//             url: modifiedUrl + '/' + info_id,
//             success: function (data) {
//                 console.log(data);
//                 $('#info_id').val(data.id);
//                 // $('#info-video-description').val(data.description);
//                 //$('#media').val(data.media);
//                 window.descriptionEditor.setData(data.description);
//                 window.videoEditor.setData(data.video);
//                 // $("#video").val(data.video);
//                 $('#save-video-info').val("update");
//                 $('.hide-edit-info').slideDown();
//                 scrollToBlockVideo();
//             },
//             error: function (data) {
//                 console.log('Error:', data);
//             }
//         });
//     });
//
//
//     //create new product / update existing product ***************************
//     $("#save-info-video").click(function (e) {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         })
//
//         e.preventDefault();
//         var formData = {
//             description: window.descriptionEditor.getData(),
//             video: window.videoEditor.getData(),
//         }
//
//         //used to determine the http verb to use [add=POST], [update=PUT]
//         var state = $('#save-info-video').val();
//         var type = "POST"; //for creating new resource
//         var info_id = $('#info_id').val();
//         ;
//         var my_url = modifiedUrl;
//         if (state == "update") {
//             type = "PUT"; //for updating existing resource
//             my_url += '/' + info_id;
//         }
//
//         console.log(formData);
//         $.ajax({
//             type: type,
//             url: my_url,
//             data: formData,
//             dataType: 'json',
//             success: function (data) {
//                 console.log(data);
//                 var descriptionText = $('<div>').html(data.description).text();
//                 var videoHtml = $('<div>').html(data.video).text();
//                 var info = '<tr id="inforow' + data.id + '"><td>' + data.id + '</td><td>' + data.description + '</td><td>' + videoHtml + '</td>';
//                 info += '<td><button class="btn btn-warning btn-detail open_video_info" value="' + data.id + '">Edit Info</button>';
//                 info += ' <button class="btn btn-danger btn-delete delete-info" value="' + data.id + '">Delete Info</button></td></tr>';
//                 if (state == "add") { //if user added a new record
//                     $('#infos-list').append(info);
//                 } else { //if user updated an existing record
//                     $("#inforow" + info_id).replaceWith(info);
//                 }
//                 $('#infos-list').append(info);
//                 $('#frmInfoVideoBlock').trigger("reset");
//                 $('.hide-edit-info-video').slideUp();
//                 location.reload();
//             },
//             error: function (data) {
//                 console.log('Error:', data);
//             }
//         });
//     });
//
//
//     //delete product and remove it from TABLE list ***************************
//     $(document).on('click', '.delete-info', function () {
//         var info_id = $(this).val();
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         })
//         $.ajax({
//             type: "DELETE",
//             url: modifiedUrl + '/' + info_id,
//             success: function (data) {
//                 console.log(data);
//                 $("#inforow" + info_id).remove();
//                 location.reload();
//             },
//             error: function (data) {
//                 console.log('Error:', data);
//             }
//         });
//     });
//
// });

/***/ }),

/***/ "./resources/js/ajax_query/newsletter_ajax.js":
/*!****************************************************!*\
  !*** ./resources/js/ajax_query/newsletter_ajax.js ***!
  \****************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/newsletter';
  //display modal form for creating new product *********************
  $('#btn_add_newsletter').click(function () {
    $('#btn-save-newsletter').val("add");
    $('#frmNewsletterBlock').trigger("reset");
    $('#newsletterModal').modal('show');
  });
  $(document).on('click', '.close-newsletter-editor', function () {
    $('#newsletterModal').modal('hide');
  });
  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_newsletter_modal', function () {
    var newsletter_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + newsletter_id,
      success: function success(data) {
        console.log(data);
        $('#newsletter_id').val(data.id);
        $('#frmNewsletterBlock #title').val(data.title);
        $('#frmNewsletterBlock #subtitle').val(data.subtitle);
        $('#approval_rodo').val(data.approval_rodo);
        $('#approval_title').val(data.approval_title);
        $('#approval_subtitle').val(data.approval_subtitle);
        $('#btn-save-newsletter').val("update");
        $('#newsletterModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#btn-save-newsletter").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      title: $('#frmNewsletterBlock #title').val(),
      subtitle: $('#frmNewsletterBlock #subtitle').val(),
      approval_rodo: $('#approval_rodo').val(),
      approval_title: $('#approval_title').val(),
      approval_subtitle: $('#approval_subtitle').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-newsletter').val();
    var type = "POST"; //for creating new resource
    var newsletter_id = $('#newsletter_id').val();
    ;
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + newsletter_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var product = '<tr id="newsletter' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.subtitle + '</td><td>' + data.approval_rodo + '</td><td>' + data.approval_title + '</td><td>' + data.approval_subtitle + '</td>';
        product += '<td><button class="btn btn-warning btn-detail open_newsletter_modal" value="' + data.id + '">Edit</button>';
        product += ' <button class="btn btn-danger btn-delete delete-newsletter" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#newsletter-list').append(product);
        } else {
          //if user updated an existing record
          $("#newsletter" + newsletter_id).replaceWith(product);
        }
        $('#frmNewsletterBlock').trigger("reset");
        $('#newsletterModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-newsletter', function () {
    var newsletter_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + newsletter_id,
      success: function success(data) {
        console.log(data);
        $("#newsletter" + newsletter_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/prices_ajax.js":
/*!************************************************!*\
  !*** ./resources/js/ajax_query/prices_ajax.js ***!
  \************************************************/
/***/ (() => {

function scrollToBlock() {
  var targetOffset = $(".hide-edit-price").offset().top;
  // Smooth scroll to the target block
  $("html, body").animate({
    scrollTop: targetOffset
  }, 1000 // Adjust the duration of the scroll animation as needed
  );
}

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/prices';
  //display modal form for creating new product *********************
  $('#btn_add_price').click(function () {
    $('#save-price').val("add");
    $('#frmPricesBlock').trigger("reset");
    $('.hide-edit-price').slideDown();
    scrollToBlock();
  });
  $(document).on('click', '.close-editor', function () {
    $(this).parent().css('display', 'none');
  });

  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_price', function () {
    var price_id = $(this).val();
    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + price_id,
      success: function success(data) {
        console.log(data);
        $('#price_id').val(data.id);
        $('#count_days').val(data.count_days);
        $('#standart_price').val(data.standart_price);
        $('#promotional_price').val(data.promotional_price);
        $('#start_promotional_date').val(data.start_promotional_date);
        $('#end_promotional_date').val(data.end_promotional_date);
        $('#save-price').val("update");
        $('.hide-edit-price').slideDown();
        scrollToBlock();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#save-price").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    var count_days = $('#count_days').val();
    var standart_price = $('#standart_price').val();
    var promotional_price = $('#promotional_price').val() || null;
    var start_promotional_date = $('#start_promotional_date').val() || null;
    var end_promotional_date = $('#end_promotional_date').val() || null;
    e.preventDefault();
    var formData = {
      count_days: count_days,
      standart_price: standart_price,
      promotional_price: promotional_price,
      start_promotional_date: start_promotional_date,
      end_promotional_date: end_promotional_date
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#save-price').val();
    var type = "POST"; //for creating new resource
    var price_id = $('#price_id').val();
    ;
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + price_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var price = '<tr id="pricerow' + data.id + '"><td>' + data.id + '</td><td>' + data.count_days + '</td><td>' + data.standart_price + '</td><td>' + data.promotional_price + '</td><td>' + data.start_promotional_date + '</td><td>' + data.end_promotional_date + '</td>';
        price += '<td><button class="btn btn-warning btn-detail open_price" value="' + data.id + '">Edit Price</button>';
        price += ' <button class="btn btn-danger btn-delete delete-price" value="' + data.id + '">Delete Price</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#prices-list').append(price);
        } else {
          //if user updated an existing record
          $("#pricerow" + price_id).replaceWith(price);
        }
        $('#frmPricesBlock').trigger("reset");
        $('.hide-edit-price').slideUp();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-price', function () {
    var price_id = $(this).val();
    var deleteModal = $('#deleteConfirmationModal');

    // Show the delete confirmation modal
    deleteModal.modal('show');

    // Handle the click event on the "Delete" button in the modal
    $('#confirmDeleteBtn').on('click', function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      $.ajax({
        type: "DELETE",
        url: modifiedUrl + '/' + price_id,
        success: function success(data) {
          console.log(data);
          $("#pricerow" + price_id).remove();
          location.reload();
        },
        error: function error(data) {
          console.log('Error:', data);
        }
      });

      // Hide the modal after the action is performed
      deleteModal.modal('hide');
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/reviews_ajax.js":
/*!*************************************************!*\
  !*** ./resources/js/ajax_query/reviews_ajax.js ***!
  \*************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/reviews';
  //display modal form for creating new review *********************
  $('#btn_add_review').click(function () {
    $('#btn-save-review').val("add");
    $('#frmReviewBlock').trigger("reset");
    $('#reviewModal').modal('show');
  });
  $(document).on('click', '.close-reviews-editor', function () {
    $('#reviewModal').modal('hide');
  });
  //display modal form for review EDIT ***************************
  $(document).on('click', '.open_review_modal', function () {
    var review_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + review_id,
      success: function success(data) {
        console.log(data);
        $('#review_id').val(data.id);
        $('#frmReviewBlock #content').val(data.content);
        $('#author').val(data.author);
        $('#btn-save-review').val("update");
        $('#reviewModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new review / update existing review ***************************
  $("#btn-save-review").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      content: $('#frmReviewBlock #content').val(),
      author: $('#author').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-review').val();
    var type = "POST"; //for creating new resource
    var review_id = $('#review_id').val();
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + review_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var review = '<tr id="review' + data.id + '"><td>' + data.id + '</td><td>' + data.content + '</td><td>' + data.author + '</td>';
        review += '<td><button class="btn btn-warning btn-detail open_review_modal" value="' + data.id + '">Edit Review</button>';
        review += ' <button class="btn btn-danger btn-delete delete-review" value="' + data.id + '">Delete Review</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#reviews-list').append(review);
        } else {
          //if user updated an existing record
          $("#review" + review_id).replaceWith(review);
        }
        $('#frmReviewBlock').trigger("reset");
        $('#reviewModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete review and remove it from TABLE list ***************************
  $(document).on('click', '.delete-review', function () {
    var review_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + review_id,
      success: function success(data) {
        console.log(data);
        $("#review" + review_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/section_title_ajax.js":
/*!*******************************************************!*\
  !*** ./resources/js/ajax_query/section_title_ajax.js ***!
  \*******************************************************/
/***/ (() => {

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/sectiontitle';
  //display modal form for creating new section title *********************
  $('#btn_add_title').click(function () {
    $('#btn-save-title').val("add");
    $('#frmSectionTitle').trigger("reset");
    $('#sectionTitleModal').modal('show');
  });
  $(document).on('click', '.close-section-title-editor', function () {
    $('#sectionTitleModal').modal('hide');
  });
  //display modal form for section title EDIT ***************************
  $(document).on('click', '.open_section_title_modal', function () {
    var sectiontitle_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + sectiontitle_id,
      success: function success(data) {
        console.log(data);
        $('#sectiontitle_id').val(data.id);
        $('#section-title').val(data.title);
        $('#section-subtitle').val(data.subtitle);
        $('#slug').val(data.slug);
        $('#btn-save-title').val("update");
        $('#sectionTitleModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new section title / update existing section title ***************************
  $("#btn-save-title").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      title: $('#section-title').val(),
      subtitle: $('#section-subtitle').val(),
      slug: $('#slug').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-title').val();
    var type = "POST"; //for creating new resource
    var sectiontitle_id = $('#sectiontitle_id').val();
    ;
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + sectiontitle_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var sectiontitle = '<tr id="sectiontitle' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.subtitle + '</td><td>' + data.slug + '</td>';
        sectiontitle += '<td><button class="btn btn-warning btn-detail open_section_title_modal" value="' + data.id + '">Edit</button>';
        sectiontitle += ' <button class="btn btn-danger btn-delete delete-section-title" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#sectiontitle-list').append(sectiontitle);
        } else {
          //if user updated an existing record
          $("#sectiontitle" + sectiontitle_id).replaceWith(sectiontitle);
        }
        $('#frmSectionTitle').trigger("reset");
        $('#sectionTitleModal').modal('hide');
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete section title and remove it from TABLE list ***************************
  $(document).on('click', '.delete-section-title', function () {
    var sectiontitle_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + sectiontitle_id,
      success: function success(data) {
        console.log(data);
        $("#sectiontitle" + sectiontitle_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/ajax_query/services_ajax.js":
/*!**************************************************!*\
  !*** ./resources/js/ajax_query/services_ajax.js ***!
  \**************************************************/
/***/ (() => {

function scrollToService() {
  var targetOffset = $(".hide-edit-service").offset().top;
  // Smooth scroll to the target block
  $("html, body").animate({
    scrollTop: targetOffset
  }, 1000 // Adjust the duration of the scroll animation as needed
  );
}

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  var modifiedUrl = url + '/services';
  //display modal form for creating new section title *********************
  $('#btn_add_service').click(function () {
    $('#btn-save-service').val("add");
    $('#frmService').trigger("reset");
    $('#serviceModal').modal('show');
  });
  $(document).on('click', '.close-service-editor', function () {
    $('#serviceModal').modal('hide');
  });
  //display modal form for section title EDIT ***************************
  $(document).on('click', '.open_service_modal', function () {
    var service_id = $(this).val();

    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + service_id,
      success: function success(data) {
        console.log(data);
        $('#service_id').val(data.id);
        $('#service-title').val(data.service_title);
        $('#service-content').html(data.service_content);
        $('#image').val(data.image);
        $('#btn-save-service').val("update");
        $('#serviceModal').modal('show');
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new service title / update existing service title ***************************
  $("#btn-save-service").click(function (e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    e.preventDefault();
    var formData = {
      service_title: $('#service-title').val(),
      image: $('#image').val(),
      service_content: $('#service-content').val()
    };

    //used to determine the http verb to use [add=POST], [update=PUT]
    var state = $('#btn-save-service').val();
    var type = "POST"; //for creating new resource
    var service_id = $('#service_id').val();
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT"; //for updating existing resource
      my_url += '/' + service_id;
    }
    console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        var service = '<tr id="service' + data.id + '"><td>' + data.id + '</td><td>' + data.service_title + '</td><td>' + data.service_content + '</td>';
        service += '<td><button class="btn btn-warning btn-detail open_section_title_modal" value="' + data.id + '">Edit</button>';
        service += ' <button class="btn btn-danger btn-delete delete-section-title" value="' + data.id + '">Delete</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#services-list').append(service);
        } else {
          //if user updated an existing record
          $("#service" + service_id).replaceWith(service);
        }
        $('#frmServices').trigger("reset");
        $('.hide-edit-service').slideUp();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete section title and remove it from TABLE list ***************************
  $(document).on('click', '.delete-service', function () {
    var service_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + service_id,
      success: function success(data) {
        console.log(data);
        $("#service" + service_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

// $(document).ready(function () {
//
//
//     function saveService() {
//         // Get the form data using FormData
//         var formData = new FormData($('#postStoreForm')[0]);
//
//         $.ajax({
//             url: modifiedUrl + '/save',
//             type: 'POST',
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function (response) {
//                 // Handle the response, e.g., show success message
//                 alert('Post saved successfully!');
//                 // Close the modal
//                 $('#postStoreModal').modal('hide');
//             },
//             error: function (error) {
//                 // Handle the error, e.g., show error message
//                 alert('Failed to save post.');
//             }
//         });
//     }
//
//     function editService(postId) {
//         $.ajax({
//             url: modifiedUrl + '/edit/' + postId,
//             type: 'GET',
//             success: function (response) {
//                 // Load the edit form into the modal
//                 $('#postEditModal').html(response);
//                 $('#postEditModal').modal('show');
//             },
//             error: function (error) {
//                 alert('Failed to load the edit form.');
//             }
//         });
//     }
//
//     function updateService() {
//         var formData = new FormData($('#editPostForm')[0]);
//
//         $.ajax({
//             url: modifiedUrl + '/update/' + $('#editPostId').val(),
//             type: 'PUT',
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function (response) {
//                 alert('Post updated successfully!');
//                 $('#postEditModal').modal('hide');
//                 window.location.reload();
//             },
//             error: function (error) {
//                 alert('Failed to update the post.');
//             }
//         });
//     }
//
//     function deleteService(postId) {
//         $.ajax({
//             url: modifiedUrl + '/delete/' + postId,
//             type: 'DELETE',
//             success: function (response) {
//                 alert('Post deleted successfully!');
//                 $('#postDeleteModal').modal('hide');
//                 window.location.reload();
//             },
//             error: function (error) {
//                 alert('Failed to delete the post.');
//             }
//         });
//     }
//
// // //     //display modal form for creating new section title *********************
// //     $('#btn_add_service').click(function () {
// //         $('#btn-save-service').val("add");
// //         $('#frmServices').trigger("reset");
// //         $('.hide-edit-service').slideDown();
// //         scrollToService();
// //     });
// //
// //     $(document).on('click', '.close-service-editor', function () {
// //         $(this).parent().css('display', 'none');
// //     });
// //     //display modal form for section title EDIT ***************************
// //     $(document).on('click', '.open_service_modal', function () {
// //         var service_id = $(this).val();
// //
// //         // Populate Data in Edit Modal Form
// //         $.ajax({
// //             type: "GET",
// //             url: modifiedUrl + '/' + service_id,
// //             success: function (data) {
// //                 console.log(data);
// //                 $('#service_id').val(data.id);
// //                 $('#service-title').val(data.service_title);
// //                 $('#image').val(data.image);
// //                 $('#service-content').val(data.service_content);
// //                 $('#btn-save-service').val("update");
// //                 $('.hide-edit-service').slideDown();
// //                 scrollToService();
// //             },
// //             error: function (data) {
// //                 console.log('Error:', data);
// //             }
// //         });
// //     });
// //
// //
// //     //create new section title / update existing section title ***************************
// //     $("#btn-save-service").click(function (e) {
// //         $.ajaxSetup({
// //             headers: {
// //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// //             }
// //         });
// //
// //         e.preventDefault();
// //         var formData = {
// //             service_title: $('#service-title').val(),
// //             image: $('#image').val(),
// //             service_content: $('#service-content').val(),
// //         }
// //
// //         //used to determine the http verb to use [add=POST], [update=PUT]
// //         var state = $('#btn-save-service').val();
// //         var type = "POST"; //for creating new resource
// //         var service_id = $('#service_id').val();
// //
// //         var my_url = modifiedUrl;
// //         if (state === "update") {
// //             type = "PUT"; //for updating existing resource
// //             my_url += '/' + service_id;
// //         }
// //         console.log(formData);
// //         $.ajax({
// //             type: type,
// //             url: my_url,
// //             data: formData,
// //             dataType: 'json',
// //             success: function (data) {
// //                 console.log(data);
// //                 var service = '<tr id="service' + data.id + '"><td>' + data.id + '</td><td>' + data.service_title + '</td><td>' + data.service_content + '</td>';
// //                 service += '<td><button class="btn btn-warning btn-detail open_section_title_modal" value="' + data.id + '">Edit</button>';
// //                 service += ' <button class="btn btn-danger btn-delete delete-section-title" value="' + data.id + '">Delete</button></td></tr>';
// //                 if (state == "add") { //if user added a new record
// //                     $('#services-list').append(service);
// //                 } else { //if user updated an existing record
// //                     $("#service" + service_id).replaceWith(service);
// //                 }
// //                 $('#frmServices').trigger("reset");
// //                 $('.hide-edit-service').slideUp();
// //                 location.reload();
// //             },
// //             error: function (data) {
// //                 console.log('Error:', data);
// //             }
// //         });
// //     });
// //
// //
// //     //delete section title and remove it from TABLE list ***************************
// //     $(document).on('click', '.delete-service', function () {
// //         var service_id = $(this).val();
// //         $.ajaxSetup({
// //             headers: {
// //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// //             }
// //         })
// //         $.ajax({
// //             type: "DELETE",
// //             url: modifiedUrl + '/' + service_id,
// //             success: function (data) {
// //                 console.log(data);
// //                 $("#service" + service_id).remove();
// //                 location.reload();
// //             },
// //             error: function (data) {
// //                 console.log('Error:', data);
// //             }
// //         });
// //     });
// });
//
//     $(document).on('click', '.close-service-editor', function () {
//         $(this).parent().css('display', 'none');
//     });
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         }
//     })
//     $('#image').change(function () {
//
//         let reader = new FileReader();
//         reader.onload = (e) => {
//             $('#preview-image').attr('src', e.target.result);
//         }
//         reader.readAsDataURL(this.files[0]);
//
//     });
//     $('#datatable-ajax-crud').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "/admin/services",
//         columns: [
//             {data: 'id', name: 'id', 'visible': false},
//             {data: 'service_title', name: 'services_title'},
//             {data: 'service_content', name: 'service_content'},
//             {
//                 data: 'image',
//                 name: 'image',
//                 // render: function (data, type, full, meta) {
//                 //     var imageUrl = "/" + data;
//                 //     var imgTag = '<img src="' + imageUrl + '" alt="Service Icon" height="auto" width="auto">';
//                 // }
//             },
//             // {data: 'created_at', name: 'created_at'},
//             {data: 'action', name: 'action', orderable: false},
//         ],
//         order: [[0, 'desc']]
//     });
//     $('#addNewService').click(function () {
//         $('#addServiceForm').trigger("reset");
//         $('.hide-edit-service').slideDown();
//         scrollToService();
//         $("#image").attr("required", "true");
//         $('#id').val('');
//         $('#preview-image').attr('src', 'https://www.riobeauty.co.uk/images/product_image_not_found.gif');
//     });
//
//     $('body').on('click', '.edit', function () {
//         var id = $(this).data('id');
//
//         // ajax
//         $.ajax({
//             type: "POST",
//             url: "{{ url('edit-book') }}",
//             data: {id: id},
//             dataType: 'json',
//             success: function (res) {
//                 $('#ajaxBookModel').html("Edit Book");
//                 $('#ajax-book-model').modal('show');
//                 $('#service_id').val(res.id);
//                 $('#service-title').val(res.service_title);
//                 $('#service-icon').removeAttr('required');
//                 $('#service-content').val(res.service_content);
//             }
//         });
//     });
//     $('body').on('click', '.delete', function () {
//         if (confirm("Delete Record?") == true) {
//             var service_id = $(this).data('id');
//
//             // ajax
//             $.ajax({
//                 type: "POST",
//                 url: modifiedUrl + '/' + service_id,
//                 data: {id: id},
//                 dataType: 'json',
//                 success: function (res) {
//                     var oTable = $('#datatable-ajax-crud').dataTable();
//                     oTable.fnDraw(false);
//                 }
//             });
//         }
//     });
//     $('#addServiceForm').submit(function (e) {
//         e.preventDefault();
//
//         var formData = new FormData(this);
//
//         $.ajax({
//             type: 'POST',
//             url: modifiedUrl + '/',
//             data: formData,
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: (data) => {
//
//                 var oTable = $('#datatable-ajax-crud').dataTable();
//                 oTable.fnDraw(false);
//                 $("#btn-save-service").html('Submit');
//                 $("#btn-save-service").attr("disabled", false);
//                 $('.hide-edit-service').slideUp();
//                 location.reload();
//             },
//             error: function (data) {
//                 console.log(data);
//             }
//         });
//     });
//     $('#service_icon').change(function () {
//
//         let reader = new FileReader();
//
//         reader.onload = (e) => {
//
//             $('#preview-image').attr('src', e.target.result);
//         }
//
//         reader.readAsDataURL(this.files[0]);
//
//     });
// });

/***/ }),

/***/ "./resources/js/ajax_query/text_content_ajax.js":
/*!******************************************************!*\
  !*** ./resources/js/ajax_query/text_content_ajax.js ***!
  \******************************************************/
/***/ (() => {

function scrollToBlock() {
  var targetOffset = $(".hide-edit-content").offset().top;
  // Smooth scroll to the target block
  $("html, body").animate({
    scrollTop: targetOffset
  }, 1000 // Adjust the duration of the scroll animation as needed
  );
}

$(document).ready(function () {
  //get base URL *********************
  var url = $('#url').val();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  var modifiedUrl = url + '/contents';
  //display modal form for creating new product *********************
  $('#btn_add_content').click(function () {
    $('#save-content').val("add");
    $('#frmContentBlock').trigger("reset");
    $('.hide-edit-content').slideDown();
    scrollToBlock();
  });
  $(document).on('click', '.close-content-editor', function () {
    $(this).parent().css('display', 'none');
  });

  //display modal form for product EDIT ***************************
  $(document).on('click', '.open_content', function () {
    var content_id = $(this).val();
    // Populate Data in Edit Modal Form
    $.ajax({
      type: "GET",
      url: modifiedUrl + '/' + content_id,
      success: function success(data) {
        //console.log(data);
        $('#content_id').val(data.id);
        // Check if the editors are initialized before setting the content
        if (tinymce.activeEditor && tinymce.get('text-editor')) {
          tinymce.get('text-editor').setContent(data.content);
        }
        $('#content_slug').val(data.slug);
        $('#save-content').val("update");
        $('.hide-edit-content').slideDown();
        scrollToBlock();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //create new product / update existing product ***************************
  $("#save-content").click(function (e) {
    e.preventDefault();
    var textContent = tinymce.get('text-editor').getContent();
    var formData = {
      content: textContent,
      slug: $('#content_slug').val()
    };
    var state = $('#save-content').val();
    var type = "POST";
    var content_id = $('#content_id').val();
    var my_url = modifiedUrl;
    if (state == "update") {
      type = "PUT";
      my_url += '/' + content_id;
    }

    // console.log(formData);
    $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        var textContent = tinymce.get('text-editor').getContent();
        var text_content = '<tr id="contentrow' + data.id + '"><td>' + data.id + '</td><td>' + textContent + '</td><td>' + data.slug + '</td>';
        text_content += '<td><button class="btn btn-warning btn-detail open_content" value="' + data.id + '">Edit content</button>';
        text_content += ' <button class="btn btn-danger btn-delete delete-content" value="' + data.id + '">Delete content</button></td></tr>';
        if (state == "add") {
          //if user added a new record
          $('#contents-list').append(text_content);
        } else {
          //if user updated an existing record
          $("#contentrow" + content_id).replaceWith(content);
        }
        $('#contents-list').append(text_content);
        $('#frmContentBlock').trigger("reset");
        $('.hide-edit-content').slideUp();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });

  //delete product and remove it from TABLE list ***************************
  $(document).on('click', '.delete-content', function () {
    var content_id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: modifiedUrl + '/' + content_id,
      success: function success(data) {
        console.log(data);
        $("#contentrow" + content_id).remove();
        location.reload();
      },
      error: function error(data) {
        console.log('Error:', data);
      }
    });
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!************************************!*\
  !*** ./resources/js/ajaxscript.js ***!
  \************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ajax_query_header_ajax__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ajax_query/header_ajax */ "./resources/js/ajax_query/header_ajax.js");
/* harmony import */ var _ajax_query_header_ajax__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_header_ajax__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _ajax_query_about_us_ajax__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ajax_query/about_us_ajax */ "./resources/js/ajax_query/about_us_ajax.js");
/* harmony import */ var _ajax_query_about_us_ajax__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_about_us_ajax__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _ajax_query_prices_ajax__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ajax_query/prices_ajax */ "./resources/js/ajax_query/prices_ajax.js");
/* harmony import */ var _ajax_query_prices_ajax__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_prices_ajax__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _ajax_query_information_ajax__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./ajax_query/information_ajax */ "./resources/js/ajax_query/information_ajax.js");
/* harmony import */ var _ajax_query_information_ajax__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_information_ajax__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _ajax_query_reviews_ajax__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./ajax_query/reviews_ajax */ "./resources/js/ajax_query/reviews_ajax.js");
/* harmony import */ var _ajax_query_reviews_ajax__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_reviews_ajax__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _ajax_query_contacts_ajax__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./ajax_query/contacts_ajax */ "./resources/js/ajax_query/contacts_ajax.js");
/* harmony import */ var _ajax_query_contacts_ajax__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_contacts_ajax__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _ajax_query_section_title_ajax__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./ajax_query/section_title_ajax */ "./resources/js/ajax_query/section_title_ajax.js");
/* harmony import */ var _ajax_query_section_title_ajax__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_section_title_ajax__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _ajax_query_text_content_ajax__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./ajax_query/text_content_ajax */ "./resources/js/ajax_query/text_content_ajax.js");
/* harmony import */ var _ajax_query_text_content_ajax__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_text_content_ajax__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _ajax_query_newsletter_ajax__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./ajax_query/newsletter_ajax */ "./resources/js/ajax_query/newsletter_ajax.js");
/* harmony import */ var _ajax_query_newsletter_ajax__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_newsletter_ajax__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _ajax_query_services_ajax__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./ajax_query/services_ajax */ "./resources/js/ajax_query/services_ajax.js");
/* harmony import */ var _ajax_query_services_ajax__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_ajax_query_services_ajax__WEBPACK_IMPORTED_MODULE_9__);










})();

/******/ })()
;