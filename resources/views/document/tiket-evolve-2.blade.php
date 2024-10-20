<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TIKET EVOLVE</title>
    {{-- {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
     --}}
     {{-- <img src="{!!$message->embedData($qr_code2, 'QrCode.png', 'image/png')!!}"> --}}
     <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($qr_code2)) !!} ">
     <h1>{{ $qr_code2 }}</h1>
</head>
<body>
    
</body>
</html>