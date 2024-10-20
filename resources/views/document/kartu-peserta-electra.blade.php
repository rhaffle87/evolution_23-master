<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font poppins  -->
   
    <title>Generate Kartu Peserta</title>

    <style>
        /*
        1.atas
        2.
        3.
        4.kanan
    */

        @page {
            margin: 50px 25px 0 25px;
        }

        .page2 {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="page1">
        <img class="" src="https://evolution-its.com/assets/img/document/kartu-electra.jpg" alt="" style="width: 510px; top: 0; left: 0;position: absolute; z-index: -99">
        <p style="position: absolute; z-index: 99; top: 183px; left: 60px; font-size: 25px; font-family: poppinsbold, sans-serif">{{$nomor_peserta}}</p>
        <p style="position: absolute; z-index: 99; top: 255px; left: 60px; font-size: 25px; font-family: poppinsbold, sans-serif">{{$nama_tim}}</p>
        <p style="position: absolute; z-index: 99; top: 332px; left: 60px; font-size: 25px; font-family: poppinsbold, sans-serif">{{$nama_ketua}}</p>
        <p style="position: absolute; z-index: 99; top: 404px; left: 60px; font-size: 25px; font-family: poppinsbold, sans-serif">{{$nama_anggota}}</p>
    <p style="position: absolute; z-index: 99; top: 477px; left: 60px; font-size: 25px; font-family: poppinsbold, sans-serif">{{$sekolah}}</p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>