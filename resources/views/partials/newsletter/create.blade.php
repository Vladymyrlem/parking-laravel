<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_newsletter" name="btn_add" class="btn btn-default pull-right">Add Newsletter Text & Description</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Approval Rodo</th>
                <th>Approval title</th>
                <th>Approval Subtitle</th>
            </tr>
            </thead>
            <tbody id="newsletter-list" name="newsletter-list">
            @foreach ($newsletter as $news)
                <tr id="newsletter-{{$news->id}}" class="active">
                    <td> {{$news->id}} </td>
                    <td> {{$news->title}} </td>
                    <td>{{$news->subtitle}}</td>
                    <td>{{$news->approval_rodo}}</td>
                    <td>{{$news->approval_title}}</td>
                    <td>{{$news->approval_subtitle}}</td>
                    <td width="350">
                        <button class="btn btn-warning btn-detail open_newsletter_modal" value="{{$news->id}}">Edit Title</button>
                        <button class="btn btn-danger btn-delete delete-newsletter" value="{{$news->id}}">Delete Title</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
