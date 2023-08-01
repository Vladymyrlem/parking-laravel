{{--<div class="hide-edit-service hide-block" style="display: none;">--}}
{{--    <button class="close-editor">Close X</button>--}}
{{--    <form action="javascript:void(0)" id="addServiceForm" name="addServiceForm" class="form-horizontal" method="POST" enctype="multipart/form-data">--}}
{{--        <input type="hidden" name="service_id" id="service_id">--}}
{{--        <div class="form-group">--}}
{{--            <label for="name" class="col-sm-2 control-label">Service Title</label>--}}
{{--            <div class="col-sm-12">--}}
{{--                <input type="text" class="form-control" id="service-title" name="service-title" placeholder="Enter Book Name" maxlength="50" required="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label class="col-sm-2 control-label">Service Content</label>--}}
{{--            <div class="col-sm-12">--}}
{{--                <input type="text" class="form-control" id="service-content" name="service-content" placeholder="Enter author Name" required="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label class="col-sm-2 control-label">Book Image</label>--}}
{{--            <div class="col-sm-6 pull-left">--}}
{{--                <input type="file" class="form-control" id="image" name="image" required="">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col-sm-offset-2 col-sm-10">--}}
{{--            <button type="submit" class="btn btn-primary" id="btn-save-service" value="addNewBook">Save changes--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--</div>--}}
{{--@include('partials.services.service-create-modal')--}}
@include('partials.services.service-edit-modal')
@include('partials.services.service-delete-modal')

