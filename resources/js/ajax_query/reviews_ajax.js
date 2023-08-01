$(document).ready(function () {

    //get base URL *********************
    var url = $('#url').val();

    var modifiedUrl = url + '/reviews'
    //display modal form for creating new review *********************
    $('#btn_add_review').click(function () {
        $('#btn-save-review').val("add");
        $('#frmReviewBlock').trigger("reset");
        $('#reviewModal').modal('show');
    });

    $(document).on('click', '.close-reviews-editor', function () {
        $('#reviewModal').modal('hide')
    });
    //display modal form for review EDIT ***************************
    $(document).on('click', '.open_review_modal', function () {
        var review_id = $(this).val();

        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + review_id,
            success: function (data) {
                console.log(data);
                $('#review_id').val(data.id);
                $('#content').val(data.content);
                $('#author').val(data.author);
                $('#btn-save-review').val("update");
                $('#reviewModal').modal('show');
            },
            error: function (data) {
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
        })

        e.preventDefault();
        var formData = {
            content: $('#content').val(),
            author: $('#author').val(),
        }

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
            success: function (data) {
                console.log(data);
                var review = '<tr id="review' + data.id + '"><td>' + data.id + '</td><td>' + data.content + '</td><td>' + data.author + '</td>';
                review += '<td><button class="btn btn-warning btn-detail open_review_modal" value="' + data.id + '">Edit Review</button>';
                review += ' <button class="btn btn-danger btn-delete delete-review" value="' + data.id + '">Delete Review</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#reviews-list').append(review);
                } else { //if user updated an existing record
                    $("#review" + review_id).replaceWith(review);
                }
                $('#frmReviewBlock').trigger("reset");
                $('#reviewModal').modal('hide')
                location.reload();
            },
            error: function (data) {
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
        })
        $.ajax({
            type: "DELETE",
            url: modifiedUrl + '/' + review_id,
            success: function (data) {
                console.log(data);
                $("#review" + review_id).remove();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
