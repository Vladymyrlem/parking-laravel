<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_content" name="btn_add_content" class="btn btn-default pull-right mb-3">Add New Blok tekstowe</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-responsive-lg" id="content-table">
        <thead>
        <tr>
            <th>Bloki tekstowe</th>
            <th>Content Slug</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody id="contents-list" name="contents-list">
        @foreach($text_content as $content)
            <tr id="contentrow-{{$content->id}}">
                <td>
                    <div class="row">{!! $content->content !!}</div>
                </td>
                <td>
                    {{ $content->slug }}
                </td>
                <td width="270">
                    <button class="btn btn-warning btn-detail open_content" value="{{$content->id}}">Edit content</button>
                    <button class="btn btn-danger btn-delete delete-content" value="{{$content->id}}">Delete content</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
