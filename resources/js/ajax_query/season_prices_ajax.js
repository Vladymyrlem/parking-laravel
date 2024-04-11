function scrollToBlock() {
    var targetOffset = $(".hide-edit-seasons-price").offset().top;
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

    var modifiedUrl = url + '/season-prices'
    //display modal form for creating new product *********************
    $('#btn_add_season_price').click(function () {
        $('#save-season-price').val("add");
        $('#frmSeasonPricesBlock').trigger("reset");
        $('.hide-edit-seasons-price').slideDown();
        scrollToBlock();
    });
    $(document).on('click', '.close-editor', function () {
        $(this).parent().css('display', 'none');
    });


    //display modal form for product EDIT ***************************
    $(document).on('click', '.open_season_price', function () {
        var season_price_id = $(this).val();
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + season_price_id,
            success: function (data) {
                console.log(data);
                $('#season_price_id').val(data.id);
                $('#month_1').val(data.month_1);
                $('#month_2').val(data.month_2);
                $('#month_3').val(data.month_3);
                $('#month_4').val(data.month_4);
                $('#month_5').val(data.month_5);
                $('#month_6').val(data.month_6);
                $('#month_7').val(data.month_7);
                $('#month_8').val(data.month_8);
                $('#month_9').val(data.month_9);
                $('#month_10').val(data.month_10);
                $('#month_11').val(data.month_11);
                $('#month_12').val(data.month_12);

                $('#save-season-price').val("update");
                $('.hide-edit-seasons-price').slideDown();
                scrollToBlock();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //create new product / update existing product ***************************
    $("#save-season-price").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        const m1 = $('#month_1').val() || null;
        const m2 = $('#month_2').val() || null;
        const m3 = $('#month_3').val() || null;
        const m4 = $('#month_4').val() || null;
        const m5 = $('#month_5').val() || null;
        const m6 = $('#month_6').val() || null;
        const m7 = $('#month_7').val() || null;
        const m8 = $('#month_8').val() || null;
        const m9 = $('#month_9').val() || null;
        const m10 = $('#month_10').val() || null;
        const m11 = $('#month_11').val() || null;
        const m12 = $('#month_12').val() || null;
        e.preventDefault();
        var formData = {
            month_1: m1,
            month_2: m2,
            month_3: m3,
            month_4: m4,
            month_5: m5,
            month_6: m6,
            month_7: m7,
            month_8: m8,
            month_9: m9,
            month_10: m10,
            month_11: m11,
            month_12: m12
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#save-season-price').val();
        var type = "POST"; //for creating new resource
        var season_price_id = $('#season_price_id').val();
        ;
        var my_url = modifiedUrl;
        if (state == "update") {
            type = "PUT"; //for updating existing resource
            my_url += '/' + season_price_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var price = '<tr id="pricerow' + data.id + '"><td>' + data.id + '</td>';
                price += '<td>' + data.month_1 + '</td><td>' + data.month_2 + '</td><td>' + data.month_3 + '</td><td>' + data.month_4
                    + '</td><td>' + data.month_5 + '</td><td>' + data.month_6 + '</td><td>' + data.month_7 + '</td><td>' + data.month_8
                    + '</td><td>' + data.month_9 + '</td><td>' + data.month_10 + '</td><td>' + data.month_11 + '</td><td>' + data.month_12 + '</td>';
                price += '<td><button class="btn btn-warning btn-detail open_season_price" value="' + data.id + '">Edit Price</button>';
                price += ' <button class="btn btn-danger btn-delete delete-price" value="' + data.id + '">Delete Price</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#season-prices-list').append(price);
                } else { //if user updated an existing record
                    $("#pricerow" + season_price_id).replaceWith(price);
                }
                $('#frmSeasonPricesBlock').trigger("reset");
                $('.hide-edit-seasons-price').slideUp();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click', '.delete-season-price', function () {
        var season_price_id = $(this).val();
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
                url: modifiedUrl + '/' + season_price_id,
                success: function (data) {
                    console.log(data);
                    $("#pricerow" + season_price_id).remove();
                    location.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            // Hide the modal after the action is performed
            deleteModal.modal('hide');
        });
    });


});
