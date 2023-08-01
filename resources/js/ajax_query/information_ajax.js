function scrollToBlock() {
    var targetOffset = $(".hide-edit-info-media").offset().top;
    // Smooth scroll to the target block
    $("html, body").animate(
        {
            scrollTop: targetOffset,
        },
        1000 // Adjust the duration of the scroll animation as needed
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

    var modifiedUrl = url + '/infos'
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
            success: function (data) {
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
            error: function (data) {
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
        }


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
            success: function (data) {
                console.log(data);
                var descriptionContent = tinymce.get('description-editor').getContent();
                var mediaContent = tinymce.get('media-editor').getContent();
                var info = '<tr id="inforow' + data.id + '"><td>' + data.id + '</td><td>' + data.description + '</td><td>' + mediaContent + '</td>';
                info += '<td><button class="btn btn-warning btn-detail open_info" value="' + data.id + '">Edit Info</button>';
                info += ' <button class="btn btn-danger btn-delete delete-info" value="' + data.id + '">Delete Info</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#infos-list').append(info);
                } else { //if user updated an existing record
                    $("#inforow" + info_id).replaceWith(info);
                }
                $('#infos-list').append(info);
                $('#frmInfoBlock').trigger("reset");
                $('.hide-edit-info-media').slideUp();
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + info_id,
            success: function (data) {
                console.log(data);
                $("#inforow" + info_id).remove();
                location.reload();
            },
            error: function (data) {
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
