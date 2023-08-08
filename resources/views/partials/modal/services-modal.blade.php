<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Section Title Form</h4>
                <button type="button" class="close-service-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmService" name="frmService" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-6 control-label">Service Title</label>
                        <div class="col-12">
                            <input type="text" class="form-control has-error" id="service-title" name="service_title" placeholder="Title" value="">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-3 control-label">Service Content</label>
                        <div class="col-12">
                            <textarea id="service-content" name="service_content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-3 control-label">Image</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="image" name="image" placeholder="Slug" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-service" value="add">Save Changes</button>
                <input type="hidden" id="service_id" name="service_id" value="0">
            </div>
        </div>
    </div>
</div>
