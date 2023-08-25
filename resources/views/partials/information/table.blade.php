<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_info" name="btn_add_info" class="btn btn-default pull-right mb-3">Dodaj nową informację</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-responsive-lg" id="info-table">
        <thead>
        <tr>
            <th>Blok tekstowy</th>
            <th>Media</th>
            <th>Akcja</th>
        </tr>
        </thead>
        <tbody id="infos-list" name="infos-list" class="">
        @foreach($information as $info)
            <tr id="inforow-{{$info->id}}">
                <td>{!! $info->description !!}</td>
                <td>
                    {!! $info->media !!}
                </td>
                <td width="220">
                    <button class="btn btn-warning btn-detail open_info" value="{{$info->id}}">Edytować info</button>
                    <button class="btn btn-danger btn-delete delete-info" value="{{$info->id}}">Usuń info</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
