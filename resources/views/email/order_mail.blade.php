<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/spartan" rel="stylesheet">

    <title>Witamy!</title>
    <style>
        html, body {
            font-family: "DejaVu Sans", sans-serif;
            line-height: 1.5;
            font-size: 12px;
        }

        body * {
            font-family: 'DejaVu Sans', sans-serif;
        }

        p {
            margin-bottom: 0;
        }
    </style>
</head>
<body class="pdf-template">
<p>Witamy!</p>
<p>Potwierdzenie rezerwacji użytkownika <b>{{ $order_mail->client_name }}</b> &nbsp; <b>{{ $order_mail->client_surname }}</b></p>
<p>numer:
    <b>
        {{ $order_mail->id }}/{{ $arrivalDate }}
    </b>
</p>
<p>
    z dnia: {{ $order_mail->arrival }}</p>
<br>
<b>Proszę wydrukować niniejsze potwierdzenie.</b>
<br>
<b>Dane rezerwacji</b>
<br>
Ilość dni: <b>
    @if( $order_mail->number_days == 1)
        {{ $order_mail->number_days }} dzień
    @elseif ($order_mail->number_days >= 2)
        {{ $order_mail->number_days }} dni
    @endif
</b>
<br>
<p>
    Nr rezerwacji:
    <b>
        {{ $order_mail->id }}/{{ $arrivalDate }}
    </b>
</p>
<p>
    Rezewacja od:
    <b>
        {{ $arrivalDate }}
    </b>
</p>
<p>
    Rezewacja do:
    <b>
        {{ $departureDate }}
    </b>
</p>
<p>Liczba osób do transferu: <b>{{ $order_mail->number_peoples }}</b></p>
<p>Nr rejestracyjny: {{ $order_mail->car_number }}</p>
<p>Marka samochodu: {{ $order_mail->car_mark }}</p>
<p>Model samochodu: {{ $order_mail->car_model }}</p>

<b>Dane rezerwującego</b>

<p>Imię i nazwisko: {{ $order_mail->client_name }}&nbsp;{{ $order_mail->client_surname }}</p>
<p>Email: {{ $order_mail->email }}</p>
<p>Nr telefonu: {{ $order_mail->phone_number }}</p>

<b>Informacja dotycząca płatności</b>

<p>Do zapłaty za parkowanie: <b>{{ $order_mail->price }}</b>&nbsp;</p>
<p>Płatność na parkingu gotówką lub kartą</p>

<b>Położenie i dojazd</b>

<p>54-530 Wrocław, ul. Skarżyńskiego 2</p>
<p>Współrzędne GPS: {!! getContact('latitude') !!},{!! getContact('longitude') !!}</p>
<p>Zobacz na Google Maps: <a href="{!! getContact('map_link') !!}" style="color: blue; text-decoration: underline">nawiguj!</a></p>

<b>Informacje dodatkowe</b>
<br>
<b>Proszę wydrukować tę wiadomość i pokazać pracownikowi przy wjeździe na parking.</b>
<br>
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
    W przypadku, kiedy w aucie jest więcej niż 5 osób do transferu na terminal i z powrotem, kierowca powinien najpierw zawieść pasażerów pod terminal lotniska razem z bagażami, gdzie ma bezpłatny
    wjazd na teren Portu Lotniczego do 10 minut. Następnie sam kierowca przyjezdża na parking ( zajmuje to 3 minuty). Podobna procedura jest przy powrocie, po odbiór auta przywozimy tylko kierowcę.
</p>
<p>Następnie na parking odprowadzają samochody sami kierowcy (zajmuje to do 3 minut). Pozwoli to usprawnić i
    przyspieszyć transfer do/z lotniska.</p>
<br>
<p>Proszę zachować szczególną ostrożność na ul. Granicznej (odcinek między zjazdem z Autostradowej Obwodnicy
    Wrocławia a Parkingiem Rondo) - <b>częste kontrole radarowe!</b></p>
<br>
<p>Pozdrawiamy,</p>
<br>
<p>Parking Rondo</p>
<p>Wrocław, ul. Skarżyńskiego 2</p>
<p>TEL: <a href="tel:{!! getContact('phone_number_1') !!}">{!! getContact('phone_number_1') !!}</a></p>
<p>GSM: <a href="tel:{!! getContact('phone_number_2') !!}">lub&nbsp;{!! getContact('phone_number_2') !!}</a></p>
<p><a href="http://www.parkingrondo.pl" style="text-decoration: none">http://www.parkingrondo.pl</a></p>
<p><a href="mailto:kontakt@parkingrondo.pl">kontakt@parkingrondo.pl</a></p>
</body>
</html>
