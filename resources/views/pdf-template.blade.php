<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">

    <title>Witamy!</title>
    <style>

        html, body {
            font-family: "DejaVu Sans", sans-serif;
            line-height: 1.5;
            font-size: 12px;
        }

        .mail-container {
            width: 100%;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        body, .mail-detail-content.simple-mail {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body * {
            font-family: "DejaVu Sans", sans-serif;
            color: rgba(60, 63, 63, 1);
        }

        .order-header {
            align-items: center;
            margin-bottom: 40px;
        }

        h3, .h3 {
            color: #3C3F3F;
            font-family: "DejaVu Sans Bold", sans-serif;
            font-size: 20px !important;
            font-style: normal;
            font-weight: 900;
            line-height: normal;
        }

        p {
            margin-bottom: 0;
        }

        .blue-text, h4 {
            color: #0074B7 !important;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        header .h3 {
            margin-bottom: 0;
        }

        header a {
            color: #0074B7;
            font-family: 'DejaVu Sans Medium', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-bottom: 10px;
        }

        header a:last-child {
            margin-bottom: 0;
        }

        .order-header {
            margin-bottom: 20px;
        }

        header img {
            width: auto;
            max-width: 240px;
        }

        #client-title {
            margin-bottom: 20px;
        }

        .client-data {
            display: table;

            align-items: center;
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

        .data-name {
            color: #3C3F3F;
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .data-value {
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

        .price-value {
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

        .order-grid {
            display: table;
            grid-column-gap: 25px;
            grid-row-gap: 10px;
            grid-template-columns: 188px auto;
            grid-template-rows: auto;
            align-items: center;
        }

        .row {
            display: flex;
            flex-flow: row;
            flex-wrap: wrap;
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
                width: 58.33333333%;
            }
        }
    </style>
</head>
<body class="pdf-template">
<div class="mail-container">
    <header class="row order-header" style="display: table;">
        <table>
            <tbody>
            <tr>
                <td>
                    <img src="{{ $logo }}" alt="">
                </td>
                <td>
                    <div class="col-md-5 col-12 d-flex flex-column align-items-start" style="padding-left: 20px;margin-left: auto;display: flex; flex-flow:column;align-items:start">
                        <a href="tel:{!! getContact('phone_number_1') !!}">(+48)&nbsp;{!! getContact('phone_number_1') !!}</a><br>
                        <a href="http://www.parkingrondo.pl" style="text-decoration: none">http://www.parkingrondo.pl</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </header>
    <div class="h3" id="client-title" style="font-family: 'DejaVu Sans Bold', sans-serif!important;">
        Potwierdzenie rezerwacji użytkownika <br> Parking Rondo:
    </div>

    <table id="client-data-table" class="client-data grid-data">
        <tbody>
        <tr>
            <td class="data-name" style="padding-right: 15px">Numer:</td>
            <td class="data-value" style="padding-left: 15px">
                {{ $order->id }}/{{ $arrivalOrder }}

            </td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 15px"> z dnia:</td>
            <td class="data-value" style="padding-left: 15px"><b>{{ $orderDate }}</b></td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 15px">Nazwa:</td>
            <td class="data-value" style="padding-left: 15px">
                {{ $order->client_name }} &nbsp; {{ $order->client_surname }}
            </td>
        </tr>
        <tr>
            <td colspan="2" class="decor-line" style="width: 100%; height: 1px; border-bottom: 1px solid #AFADAD; margin-top: 10px;padding: 5px 0;
        margin-bottom: 10px;"></td>
        </tr>
        <tr>
            <td class="data-name" style="padding-right: 15px">Do zapłaty za parkowanie:</td>
            <td class="data-value price-value" style="padding-left: 15px">
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
    <h4>Proszę wydrukować niniejsze potwierdzenie.</h4>

    <div class="order-data">
        <table id="order-grid-table" class="order-grid">
            <tbody>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Ilość dni:
                </td>
                <td class="data-value" style="padding-left: 25px;font-family: 'DejaVu Sans Medium', sans-serif;">
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
                    Rezewacja od:
                </td>
                <td class="data-value" style="padding-left: 25px">
                    {{ $arrivalDate }}
                </td>
            </tr>
            <tr class="data-row">
                <td class="data-name" style="padding-right: 25px">
                    Rezewacja do:
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
</div>
</body>
</html>
