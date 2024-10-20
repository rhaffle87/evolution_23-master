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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <script src="/assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    {{-- datatable  --}}


    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('styles')
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center mb-4">
                <a class="navbar-brand" href="javascript:void(0)">
                    <!-- <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> -->
                    <h1>EVOLUTION ITS</h1>
                    <p> User Controls </p>
                </a>
            </div>

            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/dashboard') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-home" style="font-size: 20px;"></i>
                                <span class="nav-link-text ml-2">Dashboard</span>
                            </a>
                        </li>

                        <hr class="my-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/baronas/visit') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-robot" style="font-size: 20px;"></i>
                                <span class="nav-link-text ml-2">Visitasi Baronas</span>
                            </a>
                        </li>
                        <!-- Divider -->
                        <hr class="my-2">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/user/baronas/delapan/besar') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-trophy"></i>
                                <span class="nav-link-text ml-2">8 Besar Baronas</span>
                            </a>
                        </li>

                        <!-- Pendaftaran -->
                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus" style="font-size: 20px;"></i>
                                <span class="nav-link-text ml-2"> Pendaftaran</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/daftar/electra') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Electra</h4>
                                            </div>
                                        </div>
                                    </a>

                                    {{-- SD Baronas --}}
                                    <a href="{{ url('/user/daftar/baronas/pendaftaran_sd') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Kategori SD</h4>
                                            </div>
                                        </div>
                                    </a>

                                    {{-- SMP Baronas --}}
                                    <a href="{{ url('/user/daftar/baronas/pendaftaran_smp') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Kategori SMP</h4>
                                            </div>
                                        </div>
                                    </a>

                                    {{-- SMA Baronas --}}
                                    <a href="{{ url('/user/daftar/baronas/pendaftaran_sma') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Kategori SMA</h4>
                                            </div>
                                        </div>
                                    </a>

                                    {{-- Umum Baronas --}}
                                    <a href="{{ url('/user/daftar/baronas/pendaftaran_umum') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Kategori Umum</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                {{-- <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/pembayaran/baronas') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div> --}}
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/daftar/evolve') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Evolve</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/daftar/evolve-video') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Upload Video Cover</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <!-- Divider -->
                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-money-bill-wave" style="font-size: 20px;"></i>
                                <span class="nav-link-text ml-2"> Pembayaran</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/pembayaran/electra') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Electra</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/pembayaran/baronas') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/pembayaran/baronas-paper') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Paper</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/pembayaran/evolve') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Evolve</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-edit" style="font-size: 20px;"></i>
                                <span class="nav-link-text ml-2">Edit Data</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/edit/baronas/paper') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Edit Link Youtube dan Paper Baronas</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                {{-- <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/edit/baronas/paper') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Edit Abstrak Paper Baronas</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div> --}}

                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/user/edit/baronas/link-drive') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Masukkan drive running test</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">


                </div>
            </div>
        </div>
    </nav>


    <!-- Main content -->
    <div class="main-content" id="panel">

        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand bg-custom-1 navbar-dark border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show"
                                data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <!-- <img alt="Image placeholder" src="/img/user/topik.png"> -->
                                        <i class="fas fa-user fa-lg"></i>
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="{{ url('/user/ganti-password') }}" class="dropdown-item">
                                    <span>Change password</span>
                                </a>
                                <a href="{{ route('user.logout') }}" class="dropdown-item">
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        @yield('container')


        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2023 <span class="font-weight-bold ml-1" style="color: #172B4D">Evolution</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    {{-- <script src="/assets/vendor/jquery/dist/jquery.min.js"></script> --}}
    <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="/assets/js/argon.js?v=1.2.0"></script>
    <!-- Ligthbox  -->
    {{-- <script src="/assets/js/lightbox-plus-jquery.min.js"></script> --}}
    <!-- tabel  -->

    <!-- Page level custom scripts -->
    <!-- <script src="/js/demo/datatables-demo.js"></script> -->


    {{-- <script src="/assets/vendor/jquery/dist/jquery.min.js"></script> --}}
    @yield('script')

    @stack('scripts')

</html>
