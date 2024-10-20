<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Stiker Robot</title>
</head>

<body style="font-size: 100% padding-top: 100%">
    <img src="{{ public_path('assets/img/document/stiker-robot/stiker.png') }}"
        alt="kuitansielectra"style="position:static;
    z-index:0;
    border:2px solid green;
    width:100%">

    <p class="nama-tim"
        style="position: absolute;
        font-family: sans-serif;
        font-size: 100px;
        top: 28%;
        left: 10%;
        z-index: 1;
        ">
        {{ $kategori }}</p>

    <p class="nama-tim"
        style="position: absolute;
        font-family: sans-serif;
        font-size: 80px;
        top: 50%;
        left: 10%;
        z-index: 1;
        ">
        {{ $nama_tim }}</p>

    <p class="nama-tim"
        style="position: absolute;
        font-family: sans-serif;
        font-size: 100px;
        top: 68%;
        left: 10%;
        z-index: 1;
        ">
        {{ $no_peserta }}</p>

</body>

</html>
