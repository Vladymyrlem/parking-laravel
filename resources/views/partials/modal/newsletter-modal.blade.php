<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Newsletter Form</h4>
                <button type="button" class="close-newsletter-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmNewsletterBlock" name="frmNewsletterBlock" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="inputName" class="col-sm-3 control-label">Title</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-3 control-label">Subtitle</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-12 control-label">Approval Rod</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="approval_rodo" name="approval_rodo" placeholder="Approval Rodo" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-12 control-label">Approval title</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="approval_title" name="approval_title" placeholder="Approval Title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-sm-12 control-label">Approval Subtitle</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="approval_subtitle" name="approval_subtitle" placeholder="Approval Subtitle" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="btn-save-newsletter" value="add">Save Changes</button>
                <input type="hidden" id="newsletter_id" name="newsletter_id" value="0">
            </div>
        </div>
    </div>
</div>
