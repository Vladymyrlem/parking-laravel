<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_title" name="btn_add" class="btn btn-default pull-right mb-3">Dodaj nowy tytuł sekcji</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-hover table-responsive-lg">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Title</th>
                <th>SubTitle</th>
                <th>Slug</th>
            </tr>
            </thead>
            <tbody id="sectiontitle-list" name="sectiontitle-list">
            @foreach ($section_title as $title)
                <tr id="sectiontitle-{{$title->id}}" class="active">
                    <td> {{$title->id}} </td>
                    <td> {{$title->title}} </td>
                    <td> {{$title->subtitle}} </td>
                    <td> {{$title->slug}} </td>
                    <td width="350px">
                        <button class="btn btn-warning btn-detail open_section_title_modal" value="{{$title->id}}">Edit Title</button>
                        <button class="btn btn-danger btn-delete delete-section-title" value="{{$title->id}}">Delete Title</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
