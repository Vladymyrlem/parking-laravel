<!DOCTYPE html>
<html>
<head>
    <title>Order PDF Template</title>
</head>
<body>
<h1>Order Details</h1>
<p>Order ID: {{ $order->id }}</p>
<p>Arrival Date: {{ $order->arrival }}</p>
<p>Departure Date: {{ $order->departure }}</p>
<!-- Add other order details as needed -->
</body>
</html>
