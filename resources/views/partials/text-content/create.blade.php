<div class="hide-edit-content hide-block" style="display: none;">
    <button class="close-editor">Close X</button>
    <form id="frmContentBlock" name="frmContentBlock" class="form-horizontal" novalidate="">
        <div class="form-group">
            <label for="text-editor" class="col-sm-3 control-label">Text Content</label>
            <div class="col-sm-9">
                <textarea name="content" id="text-editor" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="content_slug" class="col-sm-3 control-label">Content Slug</label>
            <div class="col-sm-9">
                <input type="text" name="slug" id="content_slug">
            </div>
        </div>
    </form>
    <button type="button" class="btn btn-primary" id="save-content" value="add">Save Changes</button>
    <input type="hidden" id="content_id" name="content_id" value="0">
</div>
