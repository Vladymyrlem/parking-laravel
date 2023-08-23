<div class="modal fade" id="headModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Head Block Form</h4>
                <button type="button" class="close-head-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmHeadBlock" name="frmHeadBlock" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control has-error" id="title" name="title" placeholder="Title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-3 control-label">Subtitle</label>
                        <div class="col-sm-12">
{{--                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" value="">--}}
                            <textarea name="subtitle" class="w-100" id="subtitle" cols="30" rows="10" placeholder="Subtitle"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                <input type="hidden" id="headblock_id" name="headblock_id" value="0">
            </div>
        </div>
    </div>
</div>
