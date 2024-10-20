@extends('admin/template/admin-template')

@section('title', 'Admin Panels | Evolution ITS')

@section('container')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
        style="min-height: 500px; background-image: url(/assets/img/bg-img/contact-bg.png); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-7"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col col-md-10">
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">TUTORIAL MENGGUNAKAN WEBSITE</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h1 class="mb-0">Videonya:</h1>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <div class="media-body p-4">
                                <span class="name mb-0 text-sm" style="text-align: justify;">
                                    {{-- video in center get from storage --}}
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                            src="{{ asset('storage/video/tutor_admin.mp4') }}" allowfullscreen></iframe>
                                </span>
                            </div>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endsection
