<div class="modal fade" id="postDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- resources/views/post-delete.blade.php -->

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postDeleteModalLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this post?</p>
                <input type="hidden" name="post_id" id="deletePostId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deletePost()">Delete</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/services/service-delete-modal.blade.php ENDPATH**/ ?>