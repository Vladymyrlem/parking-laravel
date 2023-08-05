$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/aboutus'
    //display modal form for creating new product *********************
    $('#btn_add_about_us').click(function () {
        $('#btn-save-about-us').val("add");
        $('#frmAboutUs').trigger("reset");
        $('#aboutusModal').modal('show');
    });

    $(document).on('click', '.close-head-editor', function () {
        $('#aboutusModal').modal('hide')
    });
    //display modal form for product EDIT ***************************
    $(document).on('click', '.open_about_us_modal', function () {
        var aboutus_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + aboutus_id,
            success: function (data) {
                console.log(data);
                $('#aboutus_id').val(data.id);
                $('#frmAboutUs #title').val(data.title);
                $('#frmAboutUs #content').val(data.content);
                $('#btn-save-about-us').val("update");
                $('#aboutusModal').modal('show');
            },
            error: function (data) {
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
        })
        var encodedText = encodeURIComponent($('#frmAboutUs #content').val());
        e.preventDefault();
        var formData = {
            title: $('#frmAboutUs #title').val(),
            content: encodedText,
        }

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
            success: function (data) {
                console.log(data);
                var product = '<tr id="aboutus' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + encodedText + '</td>';
                product += '<td><button class="btn btn-warning btn-detail open_about_us_modal" value="' + data.id + '">Edit</button>';
                product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#aboutus-list').append(product);
                } else { //if user updated an existing record
                    $("#aboutus" + aboutus_id).replaceWith(product);
                }
                $('#frmAboutUs').trigger("reset");
                $('#aboutusModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + aboutus_id,
            success: function (data) {
                console.log(data);
                $("#aboutus" + aboutus_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
