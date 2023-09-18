<div class="col-md-12 mt-1 mb-2">
    <button type="button" id="btn_add_service" class="btn btn-default mb-3">Dodać zaletę</button>
</div>
<div class="card">
    <div class="card-header text-center font-weight-bold">
        <h2>Zalety</h2>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-responsive-lg">
            <thead>
            <tr>
                <th>Service Title</th>
                <th>Service Content</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="services-list">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($post->service_title); ?></td>
                    <td><?php echo e($post->service_content); ?></td>
                    <td>
                        <?php echo getIconHtml("$post->image", 58, 58); ?> <!-- Width and height set to 58x58 -->
                    </td>
                    <td>
                        <!-- Edit button -->
                        <button type="button" class="btn btn-primary btn-sm btn-edit open_service_modal" value="<?php echo e($post->id); ?>">Edycja</button>

                        <!-- Delete button -->
                        <button type="button" class="btn btn-danger btn-sm" value="<?php echo e($post->id); ?>">Usuń</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<script>


    // $(document).ready(function () {
    //
    //     //get base URL *********************
    //     var url = $('#url').val();
    //
    //     var modifiedUrl = url + '/services';
    //
    //     jQuery('#postStoreForm').submit(function (e) {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //             }
    //         });
    //         e.preventDefault();
    //         // var formData = new FormData($('#postStoreForm')[0]);
    //         var formData = {
    //             service_title: $('#service-title').val(),
    //             service_content: $('#service-content').val(),
    //             image: $('#image').val(),
    //         }
    //         var url = $('#url').val();
    //         var modifiedUrl = url + '/services';
    //         $.ajax({
    //             url: modifiedUrl,
    //             type: 'POST',
    //             data: new FormData(this),
    //             processData: false,
    //             contentType: false,
    //             success: function (response) {
    //                 // Handle the response, e.g., show success message
    //                 $('input[name="image"]').attr('data-file-name', response.file_name);
    //                 $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
    //                 // Close the modal
    //                 $('#postStoreModal').modal('hide');
    //                 // location.reload();
    //             },
    //             error: function (error) {
    //                 // Handle the error, e.g., show error message
    //                 $('#resultMessage').html('<div class="alert alert-success">' + error.message + '</div>');
    //             }
    //         });
    //     })
    //     // Get the form data using FormData
    // });
    //
    //
    // function editService(postId) {
    //     var url = $('#url').val();
    //
    //     // Set the value of the hidden input field
    //     $('#service_id').val(postId);
    //     var modifiedUrl = url + '/services';
    //     $.ajax({
    //         url: modifiedUrl + '/edit/' + postId,
    //         type: 'GET',
    //         success: function (response) {
    //             // Load the edit form into the modal
    //             $('#postEditModal').modal('show');
    //             console.log(response);
    //             $('#file-name-display').text(response.image); // Assuming the image is the file name returned in the response
    //             $('#editPostForm input[id="service-title"]').val(response.service_title);
    //             $('#editPostForm textarea[id="service-content"]').val(response.service_content);
    //         },
    //         error: function (error) {
    //             $('#resultMessage').html('<div class="alert alert-success">' + error.message + '</div>');
    //         }
    //     });
    // }
    //
    // jQuery('#editPostForm').submit(function (e) {
    //     e.preventDefault(); // Prevent the default form submission behavior
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     var formData = new FormData($('#editPostForm')[0]);
    //     var url = $('#url').val();
    //
    //     // Fetch the postId from the "Edit" button's data attribute
    //     var postId = $('.btn-edit').data('post-id');
    //
    //     // Set the value of the hidden input field
    //     $('#service_id').val(postId);
    //
    //     var modifiedUrl = url + '/admin/services'; // Make sure this matches your Laravel route
    //     $.ajax({
    //         url: modifiedUrl + '/update/' + $('#service_id').val(),
    //         type: 'PUT', // Make sure you are using the PUT method
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             $('#resultMessage').html('<div class="alert alert-success">' + response.message + '</div>');
    //             console.log(response); // Log the success response in the console
    //             // $('#postEditModal').modal('hide');
    //             // window.location.reload();
    //         },
    //         error: function (error) {
    //             console.error(error); // Log the error response in the console
    //             alert('Failed to update the post.');
    //         }
    //     });
    // });
    //
    //
    //
    //
    //
    // function deleteService(postId) {
    //     var url = $('#url').val();
    //
    //     var modifiedUrl = url + '/services';
    //     $.ajax({
    //         url: modifiedUrl + '/delete/' + postId,
    //         type: 'DELETE',
    //         success: function (response) {
    //             alert('Post deleted successfully!');
    //             $('#postDeleteModal').modal('hide');
    //             window.location.reload();
    //         },
    //         error: function (error) {
    //             alert('Failed to delete the post.');
    //         }
    //     });
    // }
</script>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/services/table.blade.php ENDPATH**/ ?>