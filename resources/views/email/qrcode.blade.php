<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIKET EVOLVE</title>
</head>
<body>
   <p> Terima kasih telah melakukan pesanan tiket EVOLVE 2023. Berikut adalah QR Code untuk check-in pada venue.</p>
    <img src="{!!$message->embedData($qr_code, 'QrCode.png', 'image/png')!!}">
    
</body>
</html>