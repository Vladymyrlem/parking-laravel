$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/sectiontitle'
    //display modal form for creating new section title *********************
    $('#btn_add_title').click(function () {
        $('#btn-save-title').val("add");
        $('#frmSectionTitle').trigger("reset");
        $('#sectionTitleModal').modal('show');
    });

    $(document).on('click', '.close-section-title-editor', function () {
        $('#sectionTitleModal').modal('hide')
    });
    //display modal form for section title EDIT ***************************
    $(document).on('click', '.open_section_title_modal', function () {
        var sectiontitle_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + sectiontitle_id,
            success: function (data) {
                console.log(data);
                $('#sectiontitle_id').val(data.id);
                $('#section-title').val(data.title);
                $('#slug').val(data.slug);
                $('#btn-save-title').val("update");
                $('#sectionTitleModal').modal('show');
            },
            error: function (data) {
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
        })

        e.preventDefault();
        var formData = {
            title: $('#section-title').val(),
            slug: $('#slug').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
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
            success: function (data) {
                console.log(data);
                var sectiontitle = '<tr id="sectiontitle' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.slug + '</td>';
                sectiontitle += '<td><button class="btn btn-warning btn-detail open_section_title_modal" value="' + data.id + '">Edit</button>';
                sectiontitle += ' <button class="btn btn-danger btn-delete delete-section-title" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#sectiontitle-list').append(sectiontitle);
                } else { //if user updated an existing record
                    $("#sectiontitle" + sectiontitle_id).replaceWith(sectiontitle);
                }
                $('#frmSectionTitle').trigger("reset");
                $('#sectionTitleModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + sectiontitle_id,
            success: function (data) {
                console.log(data);
                $("#sectiontitle" + sectiontitle_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
