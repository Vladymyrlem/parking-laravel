function scrollToBlock() {
    var targetOffset = $(".hide-edit-price").offset().top;
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

    var modifiedUrl = url + '/prices'
    //display modal form for creating new product *********************
    $('#btn_add_price').click(function () {
        $('#save-price').val("add");
        $('#frmPricesBlock').trigger("reset");
        $('.hide-edit-price').slideDown();
        scrollToBlock();
    });
    $(document).on('click', '.close-editor', function () {
        $(this).parent().css('display', 'none');
    });


    //display modal form for product EDIT ***************************
    $(document).on('click', '.open_price', function () {
        var price_id = $(this).val();
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: modifiedUrl + '/' + price_id,
            success: function (data) {
                console.log(data);
                $('#price_id').val(data.id);
                $('#count_days').val(data.count_days);
                $('#standart_price').val(data.standart_price);
                $('#promotional_price').val(data.promotional_price);
                $('#start_promotional_date').val(data.start_promotional_date);
                $('#end_promotional_date').val(data.end_promotional_date);
                $('#save-price').val("update");
                $('.hide-edit-price').slideDown();
                scrollToBlock();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //create new product / update existing product ***************************
    $("#save-price").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            count_days: $('#count_days').val(),
            standart_price: $('#standart_price').val(),
            promotional_price: $('#promotional_price').val(),
            start_promotional_date: $('#start_promotional_date').val(),
            end_promotional_date: $('#end_promotional_date').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#save-price').val();
        var type = "POST"; //for creating new resource
        var price_id = $('#price_id').val();
        ;
        var my_url = modifiedUrl;
        if (state == "update") {
            type = "PUT"; //for updating existing resource
            my_url += '/' + price_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var price = '<tr id="pricerow' + data.id + '"><td>' + data.id + '</td><td>' + data.count_days + '</td><td>' + data.standart_price
                    + '</td><td>' + data.promotional_price + '</td><td>' + data.start_promotional_date + '</td><td>' + data.end_promotional_date + '</td>';
                price += '<td><button class="btn btn-warning btn-detail open_price" value="' + data.id + '">Edit Price</button>';
                price += ' <button class="btn btn-danger btn-delete delete-price" value="' + data.id + '">Delete Price</button></td></tr>';
                if (state == "add") { //if user added a new record
                    $('#prices-list').append(price);
                } else { //if user updated an existing record
                    $("#pricerow" + price_id).replaceWith(price);
                }
                $('#frmPricesBlock').trigger("reset");
                $('.hide-edit-price').slideUp();
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click', '.delete-price', function () {
        var price_id = $(this).val();
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
                url: modifiedUrl + '/' + price_id,
                success: function (data) {
                    console.log(data);
                    $("#pricerow" + price_id).remove();
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
