<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_info" name="btn_add_info" class="btn btn-default pull-right mb-3">Add New Info</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-responsive-lg" id="info-table">
        <thead>
        <tr>
            <th>Text Content</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="infos-list" name="infos-list" class="table-responsive">
        @foreach($information as $info)
            <tr id="inforow-{{$info->id}}">
                <td>{!! $info->description !!}</td>
                <td>
                    {!! $info->media !!}
                </td>
                <td width="220">
                    <button class="btn btn-warning btn-detail open_info" value="{{$info->id}}">Edit Info</button>
                    <button class="btn btn-danger btn-delete delete-info" value="{{$info->id}}">Delete Info</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
