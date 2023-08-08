function scrollToService() {
    var targetOffset = $(".hide-edit-service").offset().top;
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

    var modifiedUrl = url + '/services'
    //display modal form for creating new section title *********************
    $('#btn_add_service').click(function () {
        $('#btn-save-service').val("add");
        $('#frmService').trigger("reset");
        $('#serviceModal').modal('show');
    });

    $(document).on('click', '.close-service-editor', function () {
        $('#serviceModal').modal('hide')
    });
    //display modal form for section title EDIT ***************************
    $(document).on('click', '.open_service_modal', function () {
        var service_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + service_id,
            success: function (data) {
                console.log(data);
                $('#service_id').val(data.id);
                $('#service-title').val(data.service_title);
                $('#service-content').html(data.service_content);
                $('#image').val(data.image);
                $('#btn-save-service').val("update");
                $('#serviceModal').modal('show');
            },
            error: function (data) {
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
            service_content: $('#service-content').val(),
        }

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
            success: function (data) {
                var service = '<tr id="service' + data.id + '"><td>' + data.id + '</td><td>' + data.service_title + '</td><td>' + data.service_content + '</td>';
                service += '<td><button class="btn btn-warning btn-detail open_section_title_modal" value="' + data.id + '">Edit</button>';
                service += ' <button class="btn btn-danger btn-delete delete-section-title" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#services-list').append(service);
                } else { //if user updated an existing record
                    $("#service" + service_id).replaceWith(service);
                }
                $('#frmServices').trigger("reset");
                $('.hide-edit-service').slideUp();
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + service_id,
            success: function (data) {
                console.log(data);
                $("#service" + service_id).remove();
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
