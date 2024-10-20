<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/homepage/evol.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <!-- <link rel="stylesheet" href="/vendor/nucleo/css/nucleo.css" type="text/css"> -->
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- lightbox  -->
    <link rel="stylesheet" href="/assets/css/lightbox.min.css" type="text/css">
    <!-- Admin sb-2  -->
    <link rel="stylesheet" href="/assets/vendor/datatables/dataTables.bootstrap4.min.css">
</head>

<body>

    <!-- Main content -->
    <div class="main-content" id="panel">



        @yield('container')



        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2021 <span class="font-weight-bold ml-1" style="color: #172B4D">Evolution</span>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Elektro ITS</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </footer>
    </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/assets//vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets//vendor/js-cookie/js.cookie.js"></script>
    <script src="/assets//vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/assets//vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="/assets/js/argon.js?v=1.2.0"></script>
    <!-- Ligthbox  -->
    <script src="/assets/js/lightbox-plus-jquery.min.js"></script>
    <!-- tabel  -->
    <script src="/assets//vendor/datatables/jquery.dataTables.js"></script>
    <script src="/assets//vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>