<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    {{-- <link rel="stylesheet" href="/assets/css/lightbox.min.css" type="text/css"> --}}
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- tabel  -->
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

                    <h1>EVOLUTION</h1>


                    <p> Admin Controls </p>
                </a>
            </div>

            <div class=" navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/dashboard') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-home" style="font-size: 16px;"></i>
                                <span class="nav-link-text ml-2">Dashboard</span>
                            </a>
                        </li>
                        <!-- Divider -->
                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-newspaper mr-2" style="font-size: 16px;"></i>
                                <span>FAQ</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/news/peserta-tidak-bisa-login') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">User Tidak Bisa Login</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/admin/news/tutorial-admin') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Tutorial Admin</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/admin/news/pelaporan-bug') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Pelaporan Bug</h4>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/admin/news/minta-tambah-fitur') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Tambah Fitur</h4>
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
                                <i class="fas fa-user-plus mr-2" style="font-size: 16px;"></i>
                                <span> Daftarkan Peserta</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/daftar/electra') }}"
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
                                    <a href="{{ url('/admin/daftar/baronas') }}"
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
                            </div>
                        </li>

                        <!-- Divider -->
                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-list-alt mr-2" style="font-size: 16px;"></i>
                                <span> Daftar Peserta</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/lihat-semua-data-akun') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">All Users</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/list/electra') }}"
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
                                {{-- <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/list/semifinalis') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Semifinalis</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div> --}}
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/list/baronas') }}"
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
                                    <a href="{{ url('/admin/list/baronas-robot') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Baronas Robot</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/list/evolve') }}"
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

                        <!-- Divider -->
                        <!-- <hr class="my-2"> -->
                        <!-- <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-file-excel mr-2" style="font-size: 16px;"></i>
                                <span> Export Data</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/export/electra') }}" class="list-group-item list-group-item-action">
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
                                    <a href="{{ url('/admin/export/baronas') }}" class="list-group-item list-group-item-action">
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
                                    <a href="#" class="list-group-item list-group-item-action">
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
                        </li> -->
                        <!-- Divider -->
                        <hr class="my-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/semifinal/hasil') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-chart-bar" style="font-size: 16px;"></i>
                                <span class="nav-link-text ml-2">Semifinal</span>
                            </a>
                        </li>

                        <!-- <hr class="my-2"> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/final/cerdas-cermat-dashboard') }}" style="font-size: 18px; text-align: center">
                                <i class="fas fa-desktop" style="font-size: 16px;"></i>
                                <span class="nav-link-text ml-2">Final Electra</span>
                            </a>
                        </li> -->
                        <hr class="my-2">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-podcast mr-2" style="font-size: 16px;"></i>
                                <span>Live Baronas</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/penyisihan/baronas/sd') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Penyisihan SD</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/penyisihan/baronas/smp') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Penyisihan SMP</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/penyisihan/baronas/sma') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Penyisihan SMA</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <hr class="my-2">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/evolve/scanner') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-chart-bar" style="font-size: 16px;"></i>
                                <span class="nav-link-text ml-2">QR Scanner</span>
                            </a>
                        </li>
                        <hr class="my-2">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/baronas/delapan/besar') }}"
                                style="font-size: 18px; text-align: center">
                                <i class="fas fa-trophy"></i>
                                <span class="nav-link-text ml-2">8 Besar Baronas</span>
                            </a>
                        </li>
                        <hr class="my-2">

                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; text-align: center" class="nav-link" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-robot mr-2" style="font-size: 16px;"></i>
                                <span>Visit Baronas</span>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('admin/visit-baronas') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Summary Data Peserta</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="{{ url('/admin/baronas/meeting-room') }}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0 text-sm">Meeting Room</h4>
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
        <nav class="navbar navbar-top navbar-expand bg-default navbar-dark border-bottom">
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
                    <ul class="navbar-nav align-items-center  ml-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <!-- <img alt="Image placeholder" src="/img/user/topik.png"> -->
                                        <i class="fas fa-bell fa-lg"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="{{ url('/admin/news/minta-tambah-fitur') }}" class="dropdown-item">
                                    <span>AJUKAN FITUR</span>
                                    <p>Klik disini!!</p>
                                </a>
                                <a href="{{ url('/admin/news/peserta-tidak-bisa-login') }}" class="dropdown-item">
                                    <span>PESERTA TIDAK BISA LOGIN</span>
                                    <p>Klik disini!!</p>
                                </a>
                                <a href="{{ url('/admin/lihat-semua-data-akun') }}" class="dropdown-item">
                                    <span>ADMIN BISA CEK AKUN USER SENDIRI</span>
                                    <p>Klik disini!!</p>
                                </a>
                                <a class="dropdown-item" aria-disabled="true">
                                    <span>TOMBOL HAPUS DINONAKTIFKAN</span>
                                    <p>Harap admin hati hati dalam mengolah data</p>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <!-- <img alt="Image placeholder" src="/img/user/topik.png"> -->
                                        <i class="fas fa-user-shield fa-lg"></i>
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <a href="{{ url('/logout') }}" class="dropdown-item">
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>


        <!-- PISAHHHH  -->

        @yield('container')

        <!-- PPPPIIISAAAHH  -->


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
</body>

</html>
