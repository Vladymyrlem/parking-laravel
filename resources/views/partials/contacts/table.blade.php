<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_contact" name="btn_add" class="btn btn-default pull-right mb-3">Add New Kontakt</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-offset-2">
        <table class="table table-striped table-responsive-lg table-hover">
            <thead>
            <tr class="info">
                <th>ID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phones</th>
                <th>Coordinates</th>
                <th>Google Map Link</th>
            </tr>
            </thead>
            <tbody id="contacts-list" name="contacts-list">
            @foreach ($contacts as $contact)
                <tr id="contact-{{$contact->id}}" class="active">
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->address}}</td>
                    <td>{{$contact->phone_number_1}}<br>{{$contact->phone_number_2}}</td>
                    <td>{{$contact->latitude}}','&nbsp;{{$contact->longitude}}</td>
                    <td><a href="{{$contact->map_link}}" target="_blank">Link to google map</a></td>
                    <td width="100">
                        <button class="btn btn-warning btn-detail open_contacts_modal" value="{{$contact->id}}">Edit</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
