<!-- resources/views/post-edit.blade.php -->
<div class="modal fade" id="postEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postEditModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPostForm" enctype="multipart/form-data">
                    <!-- Add your form fields here for editing, e.g., post title -->
                    @csrf
                    @method('PUT')
                    <input type="text" name="service_title" id="service-title" class="form-control" placeholder="Post Title">
                    <textarea type="service_content" id="service-content" name="service_content" class="form-control"></textarea>
                    <input type="file" id="image" name="image">
                    <input type="hidden" id="service_id" name="service_id" value="0"><br>
                    <button type="submit" class="btn btn-primary">Save Changes</button>

                </form>
                <div id="resultMessage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{--                <button type="submit" class="btn btn-primary">Save Changes</button>--}}
            </div>
        </div>
    </div>
</div>
