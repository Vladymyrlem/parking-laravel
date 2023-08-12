<div class="modal fade" id="postStoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postStoreForm" enctype="multipart/form-data">
                    <!-- Add your form fields here, e.g., post title and image input -->
                    <?php echo e(csrf_field()); ?>

                    <input type="text" name="service-title" class="form-control" placeholder="Post Title">
                    <textarea name="service-content" class="form-control"></textarea>
                    <input type="file" name="image" class="form-control-file">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveService()">Save</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/services/service-create-modal.blade.php ENDPATH**/ ?>