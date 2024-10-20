<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    {{-- <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'> --}}

    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet"> --}}

    <!-- font poppins  -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> -->

    <title>Generate Kuitansi Evolve</title>
</head>

<body style="font-size: 100%">
    {{-- <img src="https://evolution-ee-its.com/assets/img/document/kuitansi-evolve.jpg" alt="kuitansievolve" --}}
    <img src="{{ public_path('assets/img/document/1evola5.jpg') }}" alt="top5evolve"

        style="position:static;
        z-index:1;
        width:100%">

    <p class="nama-band"
        style="position: absolute;
        font-family: sans-serif;
         font-size: 5vw;
         top: 30%;
         left: 4%;
         z-index: 2;
         ">
        <b>{{ $nama_band }}</b></p>
    
</body>

</html>
