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
    <img src="{{ public_path('assets/img/document/kuitansi-evolve.jpg') }}" alt="kuitansievolve"

        style="position:static;
        z-index:0;
        {{-- border:2px solid green; --}}
        width:100%">
    <p class="nama-band"
        style="position: absolute;
        font-family: sans-serif;
         font-size: 5vw;
         top: 41.8%;
         left: 34%;
         z-index: 1;
         ">
        <b>{{ $nama_band }}</b></p>
    <p
        style="position: absolute;
                font-family: sans-serif;
                font-size: 5vw;
                top: 54.5%;
                left: 34%;
                z-index: 2;">
        <b>{{ $nama_ketua }}</b></p>
    <p
        style="position: absolute;
        z-index: 4;
        top: 67.5%;
        left: 34%;
        font-family: sans-serif;
        font-size: 5vw;
        ">
        <b>Bukti Pembayaran EVOLVE</b></p>
    <p
        style="position: absolute;
    z-index: 1;
    top: 80%;
    left: 34%;
    font-family: sans-serif;
    font-size: 5vw;">
        <b>Rp150.000</b></p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 34%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_1 }}</b></p>
    <p
        style=" position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 41%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_2 }}</b></p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 47.5%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_3 }}</b></p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 54.5%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_4 }}</b></p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 61%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_5 }}</b></p>

        <p
        style="position: absolute;
        z-index: 1;
        top: 28.8%;
        left: 68%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        <b>{{ $digit_6 }}</b></p>
</body>

</html>
