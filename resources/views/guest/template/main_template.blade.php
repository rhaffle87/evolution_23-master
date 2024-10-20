<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/pavo/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Oct 2023 12:05:12 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- SEO Meta Tags -->
    <meta name="description" content="Evolution ITS " />
    <meta name="author" content="Danendra" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="Evolution ITS" /> <!-- website name -->
    <meta property="og:site" content="evolution-its.com" /> <!-- website link -->

    <!-- Webpage Title -->
    <title>Evolution 2023</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&amp;display=swap"
        rel="stylesheet" />
    {{-- <link href="/css/User/fontawesome-all.css" rel="stylesheet" /> --}}
    <link rel="stylesheet"
        href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link href="/css/tailwind.min.css" rel="stylesheet" />
    <link href="/css/User/swiper.css" rel="stylesheet" />
    <link href="/css/User/magnific-popup.css" rel="stylesheet" />
    <link href="/css/User/styles.css" rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="images/logo/logoevolution.png" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top">
        <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">
            <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline"
                href="{{ url('/') }}">
                <img src="/images/logo/logoevolution.png" alt="alternative" class="h-8" />
            </a>

            <button
                class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400"
                type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center"
                id="navbarsExampleDefault">
                <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                    <li>
                        <a class="nav-link page-scroll active" href="{{ url('/') }}">Home <span
                                class="sr-only">@yield('home-current')</span></a>
                    </li>
                    {{-- <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Our Event</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="{{ url('/electra') }}">Electra</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="{{ url('/baronas') }}">Baronas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="{{ url('/evolve') }}">Evolve</a>
                        </div>
                    </li> --}}
                    {{-- cek kalau belum login --}}
                    @if (Auth::guest())
                        <li>
                            <a class="nav-link page-scroll" href="{{ url('/register') }}">Register Now</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="{{ url('/login') }}">Sign In</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Daftar Event</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item page-scroll" href="{{ url('/daftar/electra') }}">Electra</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item page-scroll" href="{{ url('/daftar/baronas') }}">Baronas</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item page-scroll" href="{{ url('/daftar/evolve') }}">Evolve</a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="{{ url('/logout') }}">Logout</a>
                        </li> @endif
                </ul>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    @yield('container')

    <!-- Footer -->
    <div class="footer ">
        <div class="container px-4 sm:px-8 ">
            <h4 class="mb-4 lg:max-w-3xl lg:mx-auto">DEPARTEMEN TEKNIK ELEKTRO</h4>
            <h4 class="mb-4 lg:max-w-3xl lg:mx-auto">Fakultas Teknologi Elektro dan Informatika Cerdas</h4>
            <h4 class="mb-4 lg:max-w-3xl lg:mx-auto">Gedung A, B, C dan AJ, Kampus ITS,
                Sukolilo, Surabaya 60111</h4>
            <div class="social-container">
                {{-- logo disini --}}
            </div> <!-- end of social-container -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Scripts -->
    <script src="js/User/jquery.min.js"></script> <!-- jQuery for JavaScript plugins -->
    <script src="js/User/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/User/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/User/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/User/scripts.js"></script> <!-- Custom scripts -->
</body>

<!-- Mirrored from technext.github.io/pavo/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Oct 2023 12:05:33 GMT -->

</html>
