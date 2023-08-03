$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/newsletter'
    //display modal form for creating new product *********************
    $('#btn_add_newsletter').click(function () {
        $('#btn-save-newsletter').val("add");
        $('#frmNewsletterBlock').trigger("reset");
        $('#newsletterModal').modal('show');
    });

    $(document).on('click', '.close-newsletter-editor', function () {
        $('#newsletterModal').modal('hide')
    });
    //display modal form for product EDIT ***************************
    $(document).on('click', '.open_newsletter_modal', function () {
        var newsletter_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + newsletter_id,
            success: function (data) {
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
            error: function (data) {
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
        })

        e.preventDefault();
        var formData = {
            title: $('#frmNewsletterBlock #title').val(),
            subtitle: $('#frmNewsletterBlock #subtitle').val(),
            approval_rodo: $('#approval_rodo').val(),
            approval_title: $('#approval_title').val(),
            approval_subtitle: $('#approval_subtitle').val()
        }

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
            success: function (data) {
                console.log(data);
                var product = '<tr id="newsletter' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.subtitle + '</td><td>' + data.approval_rodo +
                    '</td><td>' + data.approval_title + '</td><td>' + data.approval_subtitle + '</td>';
                product += '<td><button class="btn btn-warning btn-detail open_newsletter_modal" value="' + data.id + '">Edit</button>';
                product += ' <button class="btn btn-danger btn-delete delete-newsletter" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#newsletter-list').append(product);
                } else { //if user updated an existing record
                    $("#newsletter" + newsletter_id).replaceWith(product);
                }
                $('#frmNewsletterBlock').trigger("reset");
                $('#newsletterModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + newsletter_id,
            success: function (data) {
                console.log(data);
                $("#newsletter" + newsletter_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
