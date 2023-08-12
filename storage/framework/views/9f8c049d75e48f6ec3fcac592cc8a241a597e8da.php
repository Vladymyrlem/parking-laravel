<!-- resources/views/post-edit.blade.php -->
<div class="modal fade" id="postEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postEditModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPostForm">
                    <!-- Add your form fields here for editing, e.g., post title -->
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <input type="text" name="service_title" id="service-title" class="form-control" placeholder="Post Title">
                    <textarea type="service_content" name="service_content" class="form-control"></textarea>
                    <input type="file" name="image" class="form-control-file">
                    <input type="hidden" name="post_id" id="editPostId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updatePost()">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/services/service-edit-modal.blade.php ENDPATH**/ ?>