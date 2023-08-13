<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/spartan" rel="stylesheet">

    <title>Otrzymałeś jeden kontakt:</title>
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
<h2>Otrzymałeś jeden kontakt:</h2>

<h3>Skontaktuj się z tym klientem najszybciej jak będzie to możliwie.</h3>
<p><strong>Imię:</strong> {{ $contactFormData['contact_first_name'] }}</p>
<p><strong>Nazwisko:</strong> {{ $contactFormData['contact_last_name'] }}</p>
<br>
<p><strong>Numer telefonu:</strong> {{ $contactFormData['contact_phone'] }}</p>
<p><strong>Adres-email:</strong> {{ $contactFormData['contact_email'] }}</p>
<p><strong>Wiadomość:</strong> {{ $contactFormData['contact_message'] }}</p>
</body>
</html>
