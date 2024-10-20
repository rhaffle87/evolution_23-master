@extends('User/template/main_template')


@section('container')
<!-- Header -->
<header class="ex-header bg-gray">
    <div class="container px-4 sm:px-8 xl:px-4">
        <h1 class="xl:ml-24 mx-auto">Electra?!</h1>
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->

<!-- Basic -->
<div class="ex-basic-1 py-12">
    <div class="container px-4 sm:px-8">
        <img class="inline mt-12 mb-4" src="images/article-details-large.jpg" alt="alternative" />
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->

<!-- Basic -->
<div class="ex-basic-1 pt-4">
    <div class="container px-4 sm:px-8 xl:px-32">
        <p class="mb-4"> DESKRIPSI ELECTRA</p>

        <h2 class="mb-4">Benefits of joining this event</h2>
        <p class="mb-4">BENEFINYA</p>
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->

<!-- Cards -->
<div class="ex-cards-1 py-4">
    <div class="container px-4 sm:px-8">

        <!-- Card -->
        <div class="card">
            <ul class="list-unstyled">
                <li class="flex">
                    <i class="fa-solid fa-circle-info text-orange-1-evol fa-2x"></i>
                    <div class="flex-1 ml-5">
                        <h5 class="mt-0.5 mb-1.5">High Quality Service</h5>
                        <p class="mb-4">Features include an eye catching morphtext in the header, details lightbox for
                            more details information</p>
                    </div>
                </li>
            </ul>
        </div> <!-- end of card -->
        <!-- end of card -->

        <!-- Card -->
        <div class="card">
            <ul class="list-unstyled">
                <li class="flex">
                    <i class="fa-solid fa-circle-info text-orange-1-evol fa-2x"></i>
                    <div class="flex-1 ml-3">
                        <h5 class="mt-0.5 mb-1.5">Prompt Timely Delivery</h5>
                        <p class="mb-4">Statistics numbers for important values, card slider for testimonials, image
                            slider for customer logos</p>
                    </div>
                </li>
            </ul>
        </div> <!-- end of card -->
        <!-- end of card -->

        <!-- Card -->
        <div class="card">
            <ul class="list-unstyled">
                <li class="flex">
                    <i class="fa-solid fa-circle-info text-orange-1-evol fa-2x"></i>
                    <div class="flex-1 ml-3">
                        <h5 class="mt-0.5 mb-1.5">Skilled Team Involved</h5>
                        <p class="mb-4">
                            Some useful extra pages are bundled with the template lik article details, terms conditions
                            and privacy policy
                        </p>
                    </div>
                </li>
            </ul>
        </div> <!-- end of card -->
        <!-- end of card -->

    </div> <!-- end of container -->
</div> <!-- end of ex-cards-1 -->
<!-- end of cards -->

<!-- Basic -->
<div class="ex-basic-1 pt-6 pb-12">
    <div class="container px-4 sm:px-8 xl:px-32">

        <h2 class="mb-6">What Are you waiting for?</h2>
        <img class="inline mb-12" src="images/article-details-small.jpg" alt="alternative" />
        <div class="flex">
            <button type="submit" class="w-100 mx-auto text-white bg-orange-1-evol focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <a class=" mb-12" href="/register">Join Us</a> </button>
        </div>
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->
@endsection