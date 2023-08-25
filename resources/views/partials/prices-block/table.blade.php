<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_price" name="btn_add_price" class="btn btn-default pull-right mb-3">Dodaj nową cenę</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-dark table-valign-middle table-responsive-lg" id="prices-table">
        <thead>
        <tr>
            <th>Liczba dni</th>
            <th>Standardowa cena</th>
            <th>Promocyjna cena</th>
            <th>Termin startu promocji</th>
            <th>Termin końcu promocji</th>
            <th colspan="3">Akcja</th>
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
                    <button class="btn btn-warning btn-detail open_price mr-2" value="{{$price->id}}"> Edycja ceny</button>
                    <button class="btn btn-danger btn-delete delete-price" value="{{$price->id}}">Usuń cenę </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
