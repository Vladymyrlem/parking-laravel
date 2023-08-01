<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_price" name="btn_add_price" class="btn btn-default pull-right">Add New Price</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-dark table-valign-middle" id="prices-table">
        <thead>
        <tr>
            <th>Count Days</th>
            <th>Standart Price</th>
            <th>Promotional Price</th>
            <th>Start Promotional Date</th>
            <th>End Promotional Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody id="prices-list" name="prices-list">
        @foreach($prices as $price)
            <tr id="pricerow-{{$price->id}}">
                <td>{{ $price->count_days }}</td>
                <td>{{ $price->standart_price }}</td>
                <td>{{ $price->promotional_price }}</td>
                <td>{{ $price->start_promotional_date }}</td>
                <td>{{ $price->end_promotional_date }}
                </td>
                <td width="250">
                    <button class="btn btn-warning btn-detail open_price mr-2" value="{{$price->id}}">Edit Price</button>
                    <button class="btn btn-danger btn-delete delete-price" value="{{$price->id}}">Delete Price</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
