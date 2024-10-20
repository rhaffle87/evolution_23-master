@extends('user/template/user-template')

@section('title', 'Unduh Kartu Peserta | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Kartu Peserta</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Berikut Kartu Peserta untuk Ketua dan Anggota Tim</h3>
                    </div>

                    <div class="card-body">
                        @if ($electra['pembayaran_status'] == 0 && $electra['email'] != null)
                            <div class="alert alert-warning alert-block">
                                <strong>Segera lakukan pembayaran untuk mengakses kartu peserta</strong>
                            </div>
                        @endif
                        @if (($electra['pembayaran_status'] == 1 || $electra['pembayaran_status'] == 3) && $electra['email'] != null)
                            <div class="alert alert-warning alert-block">
                                <strong>Harap tunggu, data Anda sedang dalam proses verifikasi oleh Admin</strong>
                            </div>
                        @endif

                        @if (($electra['pembayaran_status'] == 2 || $electra['pembayaran_status'] == 4) && $electra['email'] != null)
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-md-4" style="width: 100%;">
                                    <div class="card" style="width: 100%;">
                                        <a style="text-align: center;" class="p-3">
                                            <!-- <img class=" card-img-top p-2" src="/img/dokumen/kartu-peserta.jpg" " alt=""  style=" width: 50%; margin: 0 auto;"> -->
                                            <i style="color: #264579;" class="far fa-id-badge fa-10x"></i>
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-size: xx-large; text-align: center;">Kartu
                                                Peserta Electra</h5>
                                            <a href="{{ url('/user/kartu/electra/unduh') }}" class="btn text-lighter"
                                                style="display:flex; justify-content: center; align-items: center; background-color: #264579;">Unduh
                                                Kartu Peserta</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($electra['email'] == null)
                            <div class="alert alert-warning alert-block">
                                <strong>Anda belum mendaftar lomba apapun</strong>
                            </div>
                        @endif
                    </div>
                </div>
            @endsection
