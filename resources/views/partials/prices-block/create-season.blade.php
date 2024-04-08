<div class="hide-edit-seasons-price hide-block" style="display: none;">
    <button class="close-editor">Close X</button>
    <form id="frmSeasonPricesBlock" name="frmSeasonPricesBlock" class="form-horizontal" novalidate="">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">January</label>
                    <div class="col-sm-9">
                        <input type="number" name="count_days" id="count_days" class="form-control"
                               placeholder="January">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">February</label>
                    <div class="col-sm-9">
                        <input type="number" name="month_2" id="month_2" class="form-control" placeholder="February">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <button type="button" class="btn btn-primary" id="save-season-price" value="add">Save Changes</button>
    <input type="hidden" id="price_id" name="price_id" value="0">
</div>

<!-- resources/views/form_entries/create.blade.php -->
<!-- ... (previous code) ... -->
