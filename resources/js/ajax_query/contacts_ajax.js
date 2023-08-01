$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/contacts'
    //display modal form for creating new contact *********************
    $('#btn_add_contact').click(function () {
        $('#btn-save-contacts').val("add");
        $('#frmContactsBlock').trigger("reset");
        $('#contactsModal').modal('show');
    });

    $(document).on('click', '.close-contacts-editor', function () {
        $('#contactsModal').modal('hide')
    });
    //display modal form for contact EDIT ***************************
    $(document).on('click', '.open_contacts_modal', function () {
        var contact_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + contact_id,
            success: function (data) {
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
            error: function (data) {
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
        })

        e.preventDefault();
        var formData = {
            contacts_title: $('#contacts-title').val(),
            email: $('#contact-email').val(),
            address: $('#contact-address').val(),
            phone_number_1: $('#phone-1').val(),
            phone_number_2: $('#phone-2').val(),
            latitude: $('#latitude').val(),
            longitude: $('#longitude').val(),
            map_link: $('#map-link').val(),
        }

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
            success: function (data) {
                console.log(data);
                var contact = '<tr id="contact' + data.id + '"><td>' + data.id + '</td><td>' + data.contacts_title + '</td><td>' + data.email + '</td><td>' + data.address + '</td>';
                contact += '<td>' + data.phone_number_1 + '</br>' + data.phone_number_2 + '</td><td>' + data.latitude + ' ' + data.longitude + '</td><td>' + data.map_link + '</td>';
                contact += '<td><button class="btn btn-warning btn-detail open_contact_modal" value="' + data.id + '">Edit</button>';
                contact += ' <button class="btn btn-danger btn-delete delete-contact" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#contacts-list').append(contact);
                } else { //if user updated an existing record
                    $("#contact" + contact_id).replaceWith(contact);
                }
                $('#frmContactsBlock').trigger("reset");
                $('#contactsModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
