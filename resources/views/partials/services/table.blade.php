<div class="col-md-12 mt-1 mb-2">
    <button type="button" id="addNewService" class="btn btn-success">Add</button>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postStoreModal">
    Add Post
</button>
<div class="card">
    <div class="card-header text-center font-weight-bold">
        <h2>Laravel 8 Ajax Book CRUD with DataTable Example Tutorial</h2>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="datatable-ajax-crud">
            <thead>
            <tr>
                <th>Service Title</th>
                <th>Service Content</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="services-list">
            @foreach ($services as $post)
                <tr>
                    <td>{{ $post->service_title }}</td>
                    <td>{{ $post->service_content }}</td>
                    <td><img width="70" src="{{ $post->image_url }}" alt=""></td>
                    <td>
                        <!-- Edit button -->
                        <button type="button" class="btn btn-primary btn-sm" onclick="editService({{ $post->id }})">Edit</button>

                        <!-- Delete button -->
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteService({{ $post->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>--}}
<div class="modal fade" id="postStoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="postStoreForm" enctype="multipart/form-data">
                    <!-- Add your form fields here, e.g., post title and image input -->
                    @csrf
                    @method('post')
                    <input type="text" id="service-title" name="service-title" class="form-control" placeholder="Post Title">
                    <textarea id="service-content" name="service-content" class="form-control"></textarea>
                    <input type="file" name="image" id="image" class="form-control-file">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>


    $(document).ready(function () {

        //get base URL *********************
        var url = $('#url').val();

        var modifiedUrl = url + '/services';

        jQuery('#postStoreForm').submit(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            e.preventDefault();
            // var formData = new FormData($('#postStoreForm')[0]);
            var formData = {
                service_title: $('#service-title').val(),
                service_content: $('#service-content').val(),
                image: $('#image').val(),
            }
            var url = $('#url').val();
            var modifiedUrl = url + '/services';
            $.ajax({
                url: modifiedUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Handle the response, e.g., show success message
                    alert('Post saved successfully!');
                    // Close the modal
                    $('#postStoreModal').modal('hide');
                    console.log(data);
                },
                error: function (error) {
                    // Handle the error, e.g., show error message
                    alert('Failed to save post.');
                }
            });
        })
        // Get the form data using FormData
    });


    function editService(postId) {
        var url = $('#url').val();

        var modifiedUrl = url + '/services';
        $.ajax({
            url: modifiedUrl + '/edit/' + postId,
            type: 'GET',
            success: function (response) {
                // Load the edit form into the modal
                $('#postEditModal').html(response);
                $('#postEditModal').modal('show');
            },
            error: function (error) {
                alert('Failed to load the edit form.');
            }
        });
    }

    function updateService() {
        var formData = new FormData($('#editPostForm')[0]);
        var url = $('#url').val();

        var modifiedUrl = url + '/services';
        $.ajax({
            url: modifiedUrl + '/update/' + $('#editPostId').val(),
            type: 'PUT',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Post updated successfully!');
                $('#postEditModal').modal('hide');
                window.location.reload();
            },
            error: function (error) {
                alert('Failed to update the post.');
            }
        });
    }

    function deleteService(postId) {
        var url = $('#url').val();

        var modifiedUrl = url + '/services';
        $.ajax({
            url: modifiedUrl + '/delete/' + postId,
            type: 'DELETE',
            success: function (response) {
                alert('Post deleted successfully!');
                $('#postDeleteModal').modal('hide');
                window.location.reload();
            },
            error: function (error) {
                alert('Failed to delete the post.');
            }
        });
    }
</script>
