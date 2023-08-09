<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/spartan" rel="stylesheet">

    <title>Witamy!</title>
    <style>
        html, body {
            font-family: 'Spartan', sans-serif;
            line-height: 1.5;
            font-size: 16px;
        }

        body * {
            font-family: 'Spartan', sans-serif;
        }
    </style>
</head>
<body class="pdf-template">
<br>
<p>Potwierdzenie rezerwacji użytkownika <b>{{ $order->client_name }}</b> &nbsp; <b>{{ $order->client_surname }}</b></p>
<br>
<p>numer:
    <b>
        {{ $order->id }}/{{ $arrivalDate }}
    </b>
</p>
z dnia: {{ $order->arrival }}
<br>
<b>Proszę wydrukować niniejsze potwierdzenie.</b>
<br>
<b>Dane rezerwacji</b>
<br>
Ilość dni: <b>
    @if( $order->number_days == 1)
        {{ $order->number_days }} dzień
    @elseif ($order->number_days >= 2)
        {{ $order->number_days }} dni
    @endif
</b>
<br>
<p>
    Nr rezerwacji:
    <b>
        {{ $order->id }}/{{ $arrivalDate }}
    </b>
</p>
<p>
    Rezewacja od:
    <b>
        {{ $order->id }}/{{ $arrivalDate }}
    </b>
</p>
<p>
    Rezewacja do:
    <b>
        {{ $order->id }}/{{ $arrivalDate }}
    </b>
</p>
Liczba osób do transferu: <b>{{ $order->number_peoples }}</b>
Nr rejestracyjny: tk288ki
Marka samochodu:
Model samochodu:
Dane rezerwującego
Imię i nazwisko: test test
Email: entsolve@gmail.com
Nr telefonu: 32323232323
Informacja dotycząca płatności
Do zapłaty za parkowanie: 149.00 PLN
Płatność na parkingu gotówką lub kartą
Położenie i dojazd
54-530 Wrocław, ul. Skarżyńskiego 2
Współrzędne GPS: 51.109251,16.902584
<p>Zobacz na Google Maps: nawiguj!</p>
Informacje dodatkowe
Proszę wydrukować tę wiadomość i pokazać pracownikowi przy wjeździe na parking.
Przesiadka pasażerów oraz przepakowanie bagaży z auta klienta do busa transferowego oraz odwrotnie,
odbywa się wyłącznie w miejscu wskazanym przez obsługę parkingu.
Samochód na wyznaczonym miejscu postojowym parkuje i odbiera tylko kierowca.
Zakazane jest wjeżdżanie na miejsca postojowe wraz z pasażerami i bagażami oraz stawanie na więcej niż
jednym miejscu postojowym.
Dla każdego pojazdu wymagana jest osobna rezerwacja.
Jeśli przyjeżdżają Państwo jako grupa, więcej niż jednym samochodem oraz liczba osób do transferu na i z
lotnisko przekracza 6 osób to kierowcy proszeni są, aby odwieźć pasażerów pod terminal lotniska razem z
bagażami, gdzie mają bezpłatny wjazd na teren portu lotniczego do 10 minut.
Następnie na parking odprowadzają samochody sami kierowcy (zajmuje to do 3 minut). Pozwoli to usprawnić i
przyspieszyć transfer do/z lotniska.
Proszę zachować szczególną ostrożność na ul. Granicznej (odcinek między zjazdem z Autostradowej Obwodnicy
Wrocławia a Parkingiem Rondo) - częste kontrole radarowe!
Pozdrawiamy,
Parking Rondo
Wrocław, ul. Skarżyńskiego 2
TEL: +48 (71) 727-92-85
GSM: +48 606-550-570
http://www.parkingrondo.pl
kontakt@parkingrondo.pl
</body>
</html>
