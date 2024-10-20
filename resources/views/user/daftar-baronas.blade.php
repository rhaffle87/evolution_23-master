@extends('user/template/user-template')

@section('title', 'Pendaftaran Baronas | Evolution 2023')

@section('container')

    <div class="header bg-default pb-6">
        @if ($baronas['email'] != null && $baronas['tahapan_status'] == 2)
            <div class="alert alert-success alert-block" style="text-align: center; display:block; font-size: larger">
                Selamat Tim Anda dinyatakan lolos ke babak selanjutnya Baronas 2023!
            </div>
        @endif
        @if ($baronas['email'] != null && $baronas['tahapan_status'] == 1)
            <div class="alert alert-dark alert-block" style="text-align: center; display:block; font-size: larger">
                Mohon Maaf Anda dinyatakan tidak lolos penyisihan Baronas 2023, tetap semangat dan jangan putus asa!
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pendaftaran Baronas</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12" style="width: 100%;">
                <div class="card" style="width: 100%;">
                    <img src="/assets/img/brand/BARONAS.png" class="card-img-top p-2 logo-baronas" alt="Logo Baronas">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                        <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                                        LOGO ELECTRA
                                    </h5> -->
                        <div class="row">
                            <div class="col">
                                <div class="col">
                                    <div class="alert alert-default" role="alert">
                                        Pendaftaran Baronas telah resmi tutup. Sampai bertemu tahun depan.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="media-body p-4">
                                    <a href="{{ url('/user/form/baronas-sd') }}"
                                        class="btn btn-primary btn-lg baronas-daftar-sd {{ $baronas['kategori'] == 'SD' ? '' : 'disabled' }}"
                                        role="button" aria-disabled="true">Kategori SD</a>
                                    <a href="{{ url('/user/form/baronas-smp') }}"
                                        class="btn btn-primary btn-lg baronas-daftar-smp {{ $baronas['kategori'] == 'SMP' ? '' : 'disabled' }}"
                                        role="button" aria-disabled="true">Kategori SMP</a>
                                    <a href="{{ url('/user/form/baronas-sma') }}"
                                        class="btn btn-primary btn-lg baronas-daftar-sma {{ $baronas['kategori'] == 'SMA' ? '' : 'disabled' }}"
                                        role="button" aria-disabled="true">Kategori SMA</a>
                                    <a href="{{ url('/user/form/baronas-umum') }}"
                                        class="btn btn-primary btn-lg baronas-daftar-umum {{ $baronas['kategori'] == 'UMUM' ? '' : 'disabled' }}"
                                        role="button" aria-disabled="true">Kategori UMUM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
