@extends('guest/template/main_template')


@section('container')
    <!-- Header -->
    <header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
        <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
                <h1 class="h1-large mb-5">Evolution ITS 2023</h1>
                <p class="p-large mb-8">Electrical Event
                    for Talkshow and Competition <br>
                    by Electrical Engineering Department </p>
                <a class="btn-solid-lg" href="https://www.instagram.com/evolution_its">Our Insta</a>
                <a class="btn-solid-lg" href="https://www.instagram.com/evolution_its">Our twitter</a>
            </div>
            <div class="xl:text-right">
                <img class="inline" src="/images/header-smartphone.png" alt="alternative" />
            </div>
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Introduction -->
    <div class="pt-4 pb-14 text-center">
        <div class="container px-4 sm:px-8 xl:px-4">
            <img src="/images/logo/logoevolution.png" alt="alternative" width="25%"
                class="lg:max-w-5xl lg:mx-auto mb-4" />

            <h4 class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Evolution </h4>
            <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Evolution
                aims
                to maintain and improve the reputation of Electrical Engineering ITS, improve the
                understanding of people about technology advancement, grow a competitive,
                problem-solving,
                and innovative soul
                between participants through competitions held.</p>
        </div> <!-- end of container -->
    </div>
    <!-- end of introduction -->


    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container px-4 sm:px-8 xl:px-4">

            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="/images/logo/logo electra.png" alt="alternative" />
                </div>
                <div class="card-body">
                    <h5 class="card-title">Electra</h5>
                    <p class="mb-4">Annual national science olympiad for senior high school students
                        which the winner will
                        get a free-pass for applying in Electrical Engineering ITS.</p>
                </div>
            </div>
            <!-- end of card -->

            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="/images/logo/logo baronas.png" alt="alternative" />
                </div>
                <div class="card-body">
                    <h5 class="card-title">Baronas</h5>
                    <p class="mb-4">National robotic competition open for students and public.</p>
                </div>
            </div>
            <!-- end of card -->

            <!-- Card -->
            <div class="card">
                <div class="card-image">
                    <img src="/images/logo/logo evolve.png" alt="alternative" />
                </div>
                <div class="card-body">
                    <h5 class="card-title">Evolve</h5>
                    <p class="mb-4">Evolve as the closing event of the Evolution series is held in a variety of activities
                        in the form of band competitions and art performances with interesting guest stars</p>
                </div>
            </div>
            <!-- end of card -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->



    {{-- Video --}}
    <!-- component -->
    <!-- This is an example component -->
    <div class="px-40 ">
        <video class="w-full max-w-full h-auto" controls poster="/assets/img/bg-img/home-video-bg.png">
            <source src="/assets/video/EvolutionVideo.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>



    <!-- Statistics -->
    <div class="counter">
        <div class="container px-4 sm:px-8">

            <!-- Counter -->
            <div id="counter">
                <div class="cell">
                    <div class="counter-value number-count" data-count="{{ $total_user }}">1</div>
                    <p class="counter-info">Current Evolution Participants</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="{{ $total_electra }}">1</div>
                    <p class="counter-info">Current Electra Participants</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="{{ $total_baronas }}">1</div>
                    <p class="counter-info">Current Baronas Participants</p>
                </div>
                <div class="cell">
                    <div class="counter-value number-count" data-count="{{ $total_evolve }}">1</div>
                    <p class="counter-info">Current Evolve Participants</p>
                </div>
            </div>
            <!-- end of counter -->

        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Testimonials -->
    <div class="slider-1 py-32 bg-gray">
        <div class="container px-4 sm:px-8">
            <h2 class="mb-12 text-center lg:max-w-xl lg:mx-auto">Here are things they say
                about
                EVOLUTION ITS.</h2>
            <div class="pt-4 pb-14 text-center">
                <div class="container px-4 sm:px-8 xl:px-4">
                    <img src="/images/ketua/ketua_evolution.png" alt="alternative" width="25%"
                        class="lg:max-w-5xl lg:mx-auto mb-4" />

                    <h4 class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Head of Evolution </h4>
                    <p class="mb-4 text-gray-800 text-1xl leading-10 lg:max-w-5xl lg:mx-auto"> Electrical Event for Talkshow
                        and Competition (EVOLUTION) is an anual event organized by the students of Electrical Engineering
                        ITS. This year, EVOLUTION consist of 3 sub-event, which is Electra, Baronas, and Evolve. ELECTRA
                        (Electrical Competition Tour and Rally) is a competition regarding electrical engineering topics to
                        give students insights about Electrical Engineering Department, ITS. BARONAS (Lomba Robot Nasional)
                        is a national robotic contest for students and public to develop Indonesia’s youth ability in the
                        field of robotics through competition. Last but not least, EVOLVE (Energy for Innovation and Global
                        Revolution) is our closing event of the EVOLUTION series that will entertain the audience through a
                        music festival.</p>
                </div> <!-- end of container -->
            </div>
            <!-- Card Slider -->
            <div class="slider-container">
                <div class="swiper-container card-slider">
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="/images/ketua/ketua_electra.jpeg" alt="alternative" />
                                <div class="card-body">
                                    <p class="italic mb-3">ELECTRA menjadi salah satu wadah bagi kalian untuk masuk ke dalam
                                        Teknik Elektro ITS tanpa perlu SNBT. JADI, jangan sia-siakan kesempatan ini ya, rek!
                                    </p>
                                    <p class="testimonial-author">Head of Electra</p>
                                </div>
                            </div>
                        </div> <!-- end of swiper-slide -->
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="/images/ketua/ketua_baronas.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="italic mb-3"></p>
                                    <p class="testimonial-author">Head of Baronas</p>
                                </div>
                            </div>
                        </div> <!-- end of swiper-slide -->
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img class="card-image" src="/images/ketua/ketua_evolve.png" alt="alternative" />
                                <div class="card-body">
                                    <p class="italic mb-3"></p>
                                    <p class="testimonial-author">Head of Evolve</p>
                                </div>
                            </div>
                        </div> <!-- end of swiper-slide -->
                        <!-- end of slide -->

                    </div> <!-- end of swiper-wrapper -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- end of add arrows -->

                </div> <!-- end of swiper-container -->
            </div> <!-- end of slider-container -->
            <!-- end of card slider -->

        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->
@endsection
