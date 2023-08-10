<div class="hide-edit-price hide-block" style="display: none;">
    <button class="close-editor">Close X</button>
    <form id="frmPricesBlock" name="frmPricesBlock" class="form-horizontal" novalidate="">
        <div class="form-group">
            <label for="inputName" class="col-sm-3 control-label">Count Days</label>
            <div class="col-sm-9">
                <input type="number" name="count_days" id="count_days" class="form-control" placeholder="Count Days">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-3 control-label">Standart Price</label>
            <div class="col-sm-9">
                <input type="number" id="standart_price" class="form-control" name="standart_price" placeholder="Standart price">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDetail" class="col-sm-3 control-label">Promotional Price</label>
            <div class="col-sm-9">
                <input type="number" id="promotional_price" class="form-control" name="promotional_price" placeholder="Promotional Price">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDetail" class="col-sm-3 control-label">Start Promotional Date</label>
            <div class="col-sm-9">
                <input type="datetime-local" id="start_promotional_date" class="form-control" name="start_promotional_date" placeholder="Start Promotional Date">
            </div>
        </div>
        <div class="form-group">
            <label for="inputDetail" class="col-sm-3 control-label">End Promotional Date</label>
            <div class="col-sm-9">
                <input type="datetime-local" id="end_promotional_date" class="form-control" name="end_promotional_date" placeholder="End Promotional Date">
            </div>
        </div>
    </form>
    <button type="button" class="btn btn-primary" id="save-price" value="add">Save Changes</button>
    <input type="hidden" id="price_id" name="price_id" value="0">
</div>

<!-- resources/views/form_entries/create.blade.php -->
<!-- ... (previous code) ... -->
