<h2 class="fs-2 text-center">O Nas blok</h2>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_about_us" name="btn_add" class="btn btn-default pull-right mb-3">Dodaj nowy blok o nas</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-hover table-responsive-lg">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th id="about-us-title">Nagłówek</th>
                <th id="about-us-content">Zawartość</th>
            </tr>
            </thead>
            <tbody id="aboutus-list" name="about-list">
            @foreach ($about_us as $about)
                <tr id="about-{{$about->id}}" class="active">
                    <td> {{$about->id}} </td>
                    <td> {{$about->title}} </td>
                    <td>{!! $about->content !!}</td>
                    <td width="100px">
                        <button class="btn btn-warning btn-detail open_about_us_modal" value="{{$about->id}}">Edytuj</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
