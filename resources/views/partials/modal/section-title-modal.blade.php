<div class="modal fade" id="sectionTitleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Section Title Form</h4>
                <button type="button" class="close-head-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmSectionTitle" name="frmSectionTitle" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="section-title" name="title" placeholder="Title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-3 control-label">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-title" value="add">Save Changes</button>
                <input type="hidden" id="sectiontitle_id" name="sectiontitle_id" value="0">
            </div>
        </div>
    </div>
</div>
