<div class="modal fade" id="contactsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Contacts Form</h4>
                <button type="button" class="close-contacts-editor" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="frmContactsBlock" name="frmReviewBlock" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                        <label for="contacts-title" class="col-sm-3 control-label">Title</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="contacts-title" name="contacts_title" placeholder="Title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-email" class="col-sm-3 control-label">Email</label>
                        <div class="col-12">
                            <input type="email" class="form-control" id="contact-email" name="email" placeholder="Email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-address" class="col-sm-3 control-label">Address</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="contact-address" name="address" placeholder="Address" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-address" class="col-sm-3 control-label">Phone Number 1</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="phone-1" name="phone_number_1" placeholder="Phone Number 1" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-address" class="col-12 control-label">Phone Number 1</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="phone-2" name="phone_number_2" placeholder="Phone Number 2" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="latitude" class="col-12 control-label">Coordinates</label>
                        <div class="col-6">
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="map-link" class="col-sm-12 control-label">Google Map Link</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="map-link" name="map_link" placeholder="Google Map Link" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save-contacts" value="add">Save Changes</button>
                <input type="hidden" id="contact_id" name="review_id" value="0">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/admin-lte/resources/views/partials/modal/contacts-modal.blade.php ENDPATH**/ ?>