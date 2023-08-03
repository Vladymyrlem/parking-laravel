function scrollToBlock() {
    var targetOffset = $(".hide-edit-content").offset().top;
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

    var modifiedUrl = url + '/contents'
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
            success: function (data) {
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
            error: function (data) {
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
        }


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
            success: function (data) {
                console.log(data);
                var textContent = tinymce.get('text-editor').getContent();
                var text_content = '<tr id="contentrow' + data.id + '"><td>' + data.id + '</td><td>' + textContent + '</td><td>' + data.slug + '</td>';
                text_content += '<td><button class="btn btn-warning btn-detail open_content" value="' + data.id + '">Edit content</button>';
                text_content += ' <button class="btn btn-danger btn-delete delete-content" value="' + data.id + '">Delete content</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#contents-list').append(text_content);
                } else { //if user updated an existing record
                    $("#contentrow" + content_id).replaceWith(content);
                }
                $('#contents-list').append(text_content);
                $('#frmContentBlock').trigger("reset");
                $('.hide-edit-content').slideUp();
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + content_id,
            success: function (data) {
                console.log(data);
                $("#contentrow" + content_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
