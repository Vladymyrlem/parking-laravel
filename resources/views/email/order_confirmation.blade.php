<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Witamy!</title>
    <style>

        html, body {
            font-family: "DejaVu Sans", sans-serif;
            line-height: 1.5;
            font-size: 12px;
        }

        .row {
            display: flex;
            flex-flow: row;
            flex-wrap: wrap;
        }

        .mail-container {
            width: 100%;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        body, .mail-detail-content.simple-mail {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body * {
            font-family: 'DejaVu Sans', sans-serif;
            color: rgba(60, 63, 63, 1);
        }

        .order-header {
            align-items: center;
            margin-bottom: 40px;
        }

        h3 {
            color: #3C3F3F;
            font-family: 'DejaVu Sans Bold', sans-serif;
            font-size: 20px !important;
            font-style: normal;
            font-weight: 900;
            line-height: normal;
        }

        p {
            margin-bottom: 0;
        }

        .blue-text, h4 {
            color: #0074B7;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        header h3 {
            margin-bottom: 0;
        }

        .order-header {
            margin-bottom: 20px;
        }

        #client-title {
            margin-bottom: 20px;
        }

        #client-title {
            margin-bottom: 20px;
        }

        .client-data, div[class^="client-data"] {
            display: table;

            align-items: center !important;
            padding: 0 50px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
        }

        .client-data h4, .client-data svg {
            grid-column: span 2;
        }

        .client-data svg {
            margin-bottom: 10px;
        }

        .data-name, div[class^="data-name"] {
            color: #3C3F3F;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .data-value, div[class^="data-value"] {
            color: #3C3F3F;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .data-value a {
            text-decoration: none;
        }

        .data-value.price-value {
            color: #0074B7;
            font-family: 'DejaVu Sans Bold', sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: 700;
            line-height: 100%; /* 24px */
        }

        .order-data {
            border: 1px solid #AFADAD;
            padding: 25px 50px;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .order-grid, div[class^="order-grid"] {
            display: table;

            align-items: center;
        }

        .locations-block {
            padding: 0 50px;
        }

        .contacts-data, div[class^="contacts-data"] {
            display: table;
            padding: 0 50px;
            align-items: center;
            margin-bottom: 40px;
        }

        #client-data-table > tr > td:first-child,
        #contacts-data-table > tr > td:first-child,
        #order-grid-table > tr > td:first-child {
            padding-left: 25px;
            width: 188px;
            padding-bottom: 10px;
        }

        #client-data-table > tr > td:last-child,
        #contacts-data-table > tr > td:last-child,
        #order-grid-table > tr > td:last-child {
            padding-right: 25px;
            padding-bottom: 10px;

        }

        #contacts-title {
            margin-bottom: 20px;
        }

        .information-block {
            margin-top: 40px
        }

        #info-title {
            margin-bottom: 6px;
        }

        .information-block h4 {
            margin-bottom: 20px;
        }

        .information-block p {
            color: #757575;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 15px;
        }

        .information-block p:last-child {
            margin-bottom: 0;
        }

        .map-link {
            border-radius: 5px;
            background: #0074B7;
            width: 100%;
            max-width: 205px;
            display: flex;
            padding: 16px 65px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            align-self: stretch;
            text-align: center;
            color: #FFF;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-top: 10px;
            margin-bottom: 0;
        }

        .locations-block p {
            color: #3C3F3F;
            font-family: 'DejaVu Sans Regular', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            margin-bottom: 10px;
        }

        .locations-block img {
            width: 150px;
            height: 150px;
        }

        #locations-title {
            margin-bottom: 20px;
        }

        .locations-block span {
            color: #3C3F3F;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        footer {
            display: block;
            padding-bottom: 30px;
            margin-top: 42px;
        }

        footer p {
            color: #3C3F3F;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-bottom: 3px;
        }

        footer a {
            font-family: 'DejaVu Sans Medium', sans-serif;

        }

        footer p:first-child {
            margin-bottom: 15px;
        }

        footer img {
            float: right;
            width: auto;
            max-width: 230px;
            margin-left: 20px;
        }

        .col-12 {
            flex: 0 0 auto;
            width: 100%;
        }

        @media (min-width: 768px) {
            .col-md-3 {
                flex: 0 0 auto;
                width: 25%;
            }

            .col-md-4 {
                flex: 0 0 auto;
                width: 33.33333333%;
            }

            .col-md-5 {
                flex: 0 0 auto;
                width: 41.66666667% !important;
            }

            .col-md-9 {
                flex: 0 0 auto;
                width: 75%;
            }

            .col-md-7 {
                flex: 0 0 auto;
                width: 58.33333333% !important;
            }

        }

        @media screen and (max-width: 768px) {
            table.locations-block > tr[class^="foot-locations"] {
                display: flex;
                flex-flow: column;
            }

            table.locations-block > tr {
                display: grid;
                grid-template-columns: 1fr;
            }

            table.locations-block > tr[class^="foot-locations"] > td:last-child {
                text-align: center;
                display: none;
            }

            table.locations-block > tr.hide-locations {
                display: table !important;
            }

            .map-link, table.locations-block > tr[class^="foot-locations"] > td span {
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media screen and (max-width: 560px) {
            .client-data, .order-grid, .contacts-data {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
            }

        }
    </style>
</head>
<body class="mail-template">
<div class="mail-container">
    <header class="row order-header">
        <div class="col-md-2 col-12" style="width: auto"><h3>Witamy!</h3></div>
        <div class="col-md-5 col-12" style="width: 270px; margin-left: auto;">
            <img src="{{ asset('logomail.png') }}" alt="Parking logo">
        </div>
    </header>
    <h3 id="client-title">
        Potwierdzenie rezerwacji użytkownika <br> Parking Rondo:
    </h3>

    <table id="client-data-table" class="client-data grid-data">
        <tbody>
        <tr>
            <td class="data-name" style="padding-right: 25px">Numer:</td>
            <td class="data-value" style="padding-left: 25px">
                {{ $order->id }}/{{ $arrivalOrder }}

            </td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 25px"> z dnia:</td>
            <td class="data-value" style="padding-left: 25px"><b>{{ $orderDate }}</b></td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 25px">Nazwa:</td>
            <td class="data-value" style="padding-left: 25px">
                {{ $order->client_name }} &nbsp; {{ $order->client_surname }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="decor-line" style="width: 100%; height: 1px; border-bottom: 1px solid #AFADAD; margin-top: 10px;padding: 5px 0;
        margin-bottom: 10px;"></td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 25px">Do zapłaty za parkowanie:</td>
            <td class="data-value price-value" style="padding-left: 25px">
                {{ $order->price }}&nbsp;PLN
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"><h4>Płatność na parkingu gotówką lub kartą</h4>
            </td>
        </tr>
        </tfoot>
    </table>

    <h3 id="order-title">Dane rezerwacji dni:</h3>
    <h4>Proszę wydrukować niniejsze potwierdzenie<br>PDF, znajdujące w załączniku.</h4>

    <div class=" order-data">
        <table id="order-grid-table" class="order-grid">
            <tbody>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Ilość dni:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    @if( $order->number_days == 1)
                        {{ $order->number_days }} dzień
                    @elseif ($order->number_days >= 2)
                        {{ $order->number_days }} dni
                    @endif
                </td>

            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Nr rezerwacji:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $order->id }}/{{ $arrivalOrder }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Data przyjazdu:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $arrivalDate }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Data wyjazdu:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $departureDate }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Liczba osób do transferu:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $order->number_peoples }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Nr rejestracyjny:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $order->car_number }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Marka samochodu:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $order->car_mark }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Model samochodu:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $order->car_model }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    <h3 id="contacts-title">Dane rezerwującego</h3>
    <table id="contacts-data-table" class="contacts-data">
        <tbody>
        <tr>
            <td class="data-name" style="padding-right: 25px">
                Imię i nazwisko:
            </td>
            <td class="data-value" style="padding-left: 25px">
                {{ $order->client_name }}&nbsp;{{ $order->client_surname }}
            </td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 25px">
                Email:
            </td>
            <td class="data-value" style="padding-left: 25px">
                {{ $order->email }}
            </td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 25px">
                Nr telefonu:
            </td>
            <td class="data-value" style="padding-left: 25px">
                {{ $order->phone_number }}
            </td>
        </tr>
        </tbody>
    </table>

    <h3 id="locations-title">Położenie i dojazd</h3>

    <table align="center" id="locations-table" class="locations-block"
           style="margin-left: auto; margin-right: auto;text-align:center;">
        <tbody>
        <tr>
            <td style="font-size: 16px!important;text-align:center;">54-530 Wrocław, ul. Skarżyńskiego 2</td>
        </tr>
        <tr>
            <td style="font-size: 16px!important;text-align:center;">
                Współrzędne GPS: {!! getContact('latitude') !!},{!! getContact('longitude') !!}
            </td>
        </tr>
        <tr class="foot-locations">
            <td style="padding-top: 20px;text-align:center;"><span
                    style="margin-left: auto;margin-right: auto;width: 100%;text-align:center;">Zobacz na Google Maps:</span>
                <a class="map-link" target="_blank"
                   style="margin-left:auto;margin-right: auto;"
                   href="https://maps.app.goo.gl/ymq4oMUwmdJkE6HM9"
                   rel="noopener">nawiguj!</a>
            </td>

        </tr>

        <tr>
            <td style="text-align:center;padding-top:20px;">
                <img style="margin-left:auto;margin-right: auto;" src="{{ asset('images/qrcode.png') }}" alt="">
            </td>
        </tr>
        </tbody>
    </table>


    <div class="information-block">
        <h3 id="info-title">Informacje dodatkowe</h3>

        <h4>Proszę wydrukować tę wiadomość i pokazać pracownikowi przy wjeździe na parking.</h4>

        <p>
            Przesiadka pasażerów oraz przepakowanie bagaży z auta klienta do busa transferowego oraz odwrotnie,
            odbywa się wyłącznie w miejscu wskazanym przez obsługę parkingu.
        </p>
        <p>Samochód na wyznaczonym miejscu postojowym parkuje i odbiera tylko kierowca.</p>
        <p>
            Zakazane jest wjeżdżanie na miejsca postojowe wraz z pasażerami i bagażami oraz stawanie na więcej niż
            jednym miejscu postojowym.
        </p>

        <p>Dla każdego pojazdu wymagana jest osobna rezerwacja.</p>
        <p>Jeśli przyjeżdżają Państwo jako grupa, więcej niż jednym samochodem oraz liczba osób do transferu na i z
            lotnisko przekracza 8 osób to kierowcy proszeni są, aby odwieźć pasażerów pod terminal lotniska razem z
            bagażami, gdzie mają bezpłatny wjazd na teren portu lotniczego do 10 minut.
        </p>
        <p>
            W przypadku, kiedy w aucie jest więcej niż 5 osób do transferu na terminal i z powrotem, kierowca powinien
            najpierw zawieść pasażerów pod terminal lotniska razem z bagażami, gdzie ma
            bezpłatny
            wjazd na teren Portu Lotniczego do 10 minut. Następnie sam kierowca przyjezdża na parking ( zajmuje to 3
            minuty). Podobna procedura jest przy powrocie, po odbiór auta przywozimy tylko
            kierowcę.
        </p>
        <p>Następnie na parking odprowadzają samochody sami kierowcy (zajmuje to do 3 minut). Pozwoli to usprawnić i
            przyspieszyć transfer do/z lotniska.</p>

        <p>Proszę zachować szczególną ostrożność na ul. Granicznej (odcinek między zjazdem z Autostradowej Obwodnicy
            Wrocławia a Parkingiem Rondo) - <b>częste kontrole radarowe!</b></p>
    </div>

    <footer>
        <p>Pozdrawiamy,</p>
        <p>Parking Rondo Wrocław, ul. Skarżyńskiego 2</p>
        <p>TEL: <a href="tel:{!! getContact('phone_number_1') !!}">{!! getContact('phone_number_1') !!}</a></p>
        <img src="{{ asset('logomail.png') }}" alt="Parking logo">
        <p>GSM: <a href="tel:{!! getContact('phone_number_2') !!}">lub&nbsp;{!! getContact('phone_number_2') !!}</a></p>
        <p><a href="http://www.parkingrondo.pl" style="text-decoration: none">http://www.parkingrondo.pl</a></p>
        <p><a href="mailto:kontakt@parkingrondo.pl">kontakt@parkingrondo.pl</a></p>
    </footer>

</div>
</body>
</html>
