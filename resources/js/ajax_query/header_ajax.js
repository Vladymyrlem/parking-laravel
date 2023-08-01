$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/headblock'
    //display modal form for creating new product *********************
    $('#btn_add').click(function () {
        $('#btn-save').val("add");
        $('#frmHeadBlock').trigger("reset");
        $('#headModal').modal('show');
    });

    $(document).on('click', '.close-head-editor', function () {
        $('#headModal').modal('hide')
    });
    //display modal form for product EDIT ***************************
    $(document).on('click', '.open_header_modal', function () {
        var headblock_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + headblock_id,
            success: function (data) {
                console.log(data);
                $('#headblock_id').val(data.id);
                $('#title').val(data.title);
                $('#subtitle').val(data.subtitle);
                $('#btn-save').val("update");
                $('#headModal').modal('show');
            },
            error: function (data) {
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
        })

        e.preventDefault();
        var formData = {
            title: $('#title').val(),
            subtitle: $('#subtitle').val(),
        }

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
            success: function (data) {
                console.log(data);
                var product = '<tr id="headblock' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.subtitle + '</td>';
                product += '<td><button class="btn btn-warning btn-detail open_header_modal" value="' + data.id + '">Edit</button>';
                product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#headblock-list').append(product);
                } else { //if user updated an existing record
                    $("#headblock" + headblock_id).replaceWith(product);
                }
                $('#frmHeadBlock').trigger("reset");
                $('#headModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + headblock_id,
            success: function (data) {
                console.log(data);
                $("#headblock" + headblock_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
