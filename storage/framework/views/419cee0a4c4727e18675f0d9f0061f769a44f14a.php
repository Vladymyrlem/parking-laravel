<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Review Form</h4>
                <button type="button" class="close-reviews-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmReviewBlock" name="frmReviewBlock" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-3 control-label">Content</label>
                        <div class="col-12">
                            <textarea class="w-100" name="content" id="content" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-3 control-label">Author</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-review" value="add">Save Changes</button>
                <input type="hidden" id="review_id" name="review_id" value="0">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/modal/review-modal.blade.php ENDPATH**/ ?>