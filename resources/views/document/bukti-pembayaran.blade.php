<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font poppins  -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> -->

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> -->

    <title>Generate Kuitansi Electra</title>
</head>

<body style="font-size: 100%">
    <img src="https://evolution-ee-its.com/assets/img/document/kuitansi-electra.jpg" alt="kuitansielectra"
        style="position:static;
        z-index:0;
        border:2px solid green;
        width:100%">
    <p class="nama-tim"
        style="position: absolute;
        font-family: sans-serif;
         font-size: 3vw;
         top: 40%;
         left: 38%;
         z-index: 1;
         ">
        {{ $nama_tim }}</p>
    <p
        style="position: absolute;
                font-family: sans-serif;
                font-size: 3vw;
                top: 49%;
                left: 38%;
                z-index: 2;">
        {{ $nama_ketua }}</p>
    <p
        style="position: absolute;
    z-index: 3;
    top: 57%;
    left: 38%;
    font-family: sans-serif;
    font-size: 3vw;">
        {{ $nama_anggota }}</p>
    <p
        style="position: absolute;
        z-index: 4;
        top: 66%;
        left: 38%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $biaya }}</p>
    <p
        style="position: absolute;
    z-index: 1;
    top: 75%;
    left: 38%;
    font-family: sans-serif;
    font-size: 3vw;">
        {{ $untuk_membayar }}</p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 26%;
        left: 34%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $region_pertama }}</p>
    <p
        style=" position: absolute;
        z-index: 1;
        top: 26%;
        left: 39%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $region_kedua }}</p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 26%;
        left: 49%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $digit_pertama }}</p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 26%;
        left: 54%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $digit_kedua }}</p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 26%;
        left: 59%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $digit_ketiga }}</p>
    <p
        style="position: absolute;
        z-index: 1;
        top: 26%;
        left: 64%;
        font-family: sans-serif;
        font-size: 3vw;
        ">
        {{ $digit_keempat }}</p>
</body>

</html>
