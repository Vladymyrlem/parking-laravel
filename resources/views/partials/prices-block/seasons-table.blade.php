<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <button id="btn_add_season_price" name="btn_add_season_price" class="btn btn-default pull-right mb-3">Dodaj nową cenę</button>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-dark table-valign-middle table-responsive-lg" id="prices-table">
        <thead>
        <tr>
            <th>Liczba dni</th>
            <th>Styczeń</th>
            <th>Luty</th>
            <th>Marzec</th>
            <th>Kwiecień</th>
            <th>Maj</th>
            <th>Czerwiec</th>
            <th>Lipiec</th>
            <th>Sierpień</th>
            <th>Wrzesień</th>
            <th>Październik</th>
            <th>Listopad</th>
            <th>Grudzień</th>
            <th colspan="3">Akcja</th>
        </tr>
        </thead>
        <tbody id="season-prices-list" name="season-prices-list">
        @foreach($seasonPrices as $price)
            <tr id="pricerow-{{$price->id}}">
                <td>{{ $price->count_days }}</td>

            @for ($i = 1; $i <= 12; $i++)
                    <td> {{ $price->{'month_' . $i} }}</td>
                @endfor
                <td width="250">
                    <button class="btn btn-warning btn-detail open_season_price mr-2" value="{{$price->id}}"> Edycja ceny</button>
                    <button class="btn btn-danger btn-delete delete-season-price" value="{{$price->id}}">Usuń cenę </button>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
