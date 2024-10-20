@extends('admin/template/admin-template')

@section('title', 'Pendaftaran Evolve Admin | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pendaftaran</a></li>
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
                    <!-- <img src="/img/brand/TEXT_Evolve.png" class="card-img-top p-2" alt="Logo Evolve" style="width: 50%; margin: 0 auto;"> -->
                    <img src="/assets/img/homepage/logoEvolve.png" class="card-img-top p-3 logo-baronas" alt="Logo Evolve">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                            <img src="/img/brand/TEXT_Evolve.png" alt="">
                        </h5> -->

                        <div class="row">
                            <div class="col">

                                @if ($notification = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        Data Tim <strong>"{{ $notification }}"</strong> telah berhasil didaftarkan
                                    </div>
                                @endif

                                @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger alert-block">
                                        Email : <strong>{{ $notification }}</strong> telah didaftarkan sebelumnnya
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Evolve</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.daftarEvolve') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Email Peserta</label>
                                                <input name="email" type="text" id="nomor-hp" class="form-control"
                                                    placeholder="Contoh : adarsangpejoeangcinta@gmail.com" value=""
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Lengkap</label>
                                                <input name="nama" type="text" id="nama" class="form-control"
                                                    placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Institusi </label>
                                                <input name="institusi" type="text" id="institusi" class="form-control"
                                                    placeholder="Contoh : Institut Teknologi Sepuluh Nopember" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Domisili </label>
                                                <input name="domisili" type="text" id="domisili" class="form-control"
                                                    placeholder="Contoh :  Surabaya" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor Telepon
                                                    (WA)</label>
                                                <input name="nomor_telp" type="number" id="nomor_telp" class="form-control"
                                                    placeholder="Contoh : 08123456789" required>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarevolve" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                Daftar
                                            </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaranAdmin"
                                                style="color: white; width: 100%; background-color: #1a174d">Daftarkan</button>

                                            <div class="modal fade" id="submitPendaftaranAdmin" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Data sudah benar ?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-target="#daftarevolve" type="submit"
                                                                value="daftar" class="btn btn-md"
                                                                style="color: white; background-color: #1a174d">Daftar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4" />
                                        </form>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection
