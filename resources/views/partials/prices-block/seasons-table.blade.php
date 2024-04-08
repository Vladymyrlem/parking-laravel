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
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th colspan="3">Akcja</th>
        </tr>
        </thead>
        <tbody id="season-prices-list" name="season-prices-list">
        @foreach($prices as $price)
            <tr id="pricerow-{{$price->id}}">
                @for ($i = 1; $i <= 16; $i++)
                    <td> {{ $price->{'month_' . $i} }} for month_{{ $i }}</td>
                @endfor
                <td width="250">
                    <button class="btn btn-warning btn-detail open_season_price mr-2" value="{{$price->id}}"> Edycja ceny</button>
                    <button class="btn btn-danger btn-delete delete-season-price" value="{{$price->id}}">Usuń cenę </button>
                </td>
            </tr>
            @if($price->count_days === '15+')
            <tr id="pricerow-15-more">
                @for ($i = 1; $i <= 16; $i++)
                    <td> {{ $price->{'month_' . $i} }} for month_{{ $i }}</td>
                @endfor
                <td width="250">
                    <button class="btn btn-warning btn-detail open_price mr-2" value="{{$price->id}}"> Edycja ceny</button>
                    <button class="btn btn-danger btn-delete delete-price" value="{{$price->id}}">Usuń cenę </button>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
