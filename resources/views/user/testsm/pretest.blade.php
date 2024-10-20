@extends('/user/template/user-template-semifinal')

@section('title', 'Semifinal Tahap 1 | Evolution 2021')

@section('container')

<!-- Header -->
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">

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
                <!-- <img src="/img/brand/TEXT_ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <div class="card">
                                <div class="card-body">
                                    <h1>Pre Test</h1>
                                    <i>Perhatikan soal yang ditampilkan di zoom</i>
                                    <br> <br>

                                    <div class="row">
                                        <div class="col-1">

                                        </div>
                                        <div class="col-5 col-sm-4" style="text-align: center;">
                                            <h1>Medium</h1>
                                        </div>
                                        <div class="col-5 col-sm-4 mb-2" style="text-align: center;">
                                            <h1>Hard</h1>
                                        </div>
                                        <div class="col-3">

                                        </div>
                                    </div>

                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    1
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_1_m" type="text" id="x_1_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_1_m}}" {{ $peserta['x_1_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_1_h" type="text" id="x_1_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_1_h}}" {{ $peserta['x_1_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==1 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==1 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>

                                    @if($peserta->sesi_pretest >= 2)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    2
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_2_m" type="text" id="x_2_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_2_m}}" {{ $peserta['x_2_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_2_h" type="text" id="x_2_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_2_h}}" {{ $peserta['x_2_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==2 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==2 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 3)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    3
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_3_m" type="text" id="x_3_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_3_m}}" {{ $peserta['x_3_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_3_h" type="text" id="x_3_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_3_h}}" {{ $peserta['x_3_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==3 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==3 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 4)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    4
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_4_m" type="text" id="x_4_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_4_m}}" {{ $peserta['x_4_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_4_h" type="text" id="x_4_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_4_h}}" {{ $peserta['x_4_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==4 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==4 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 5)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    5
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_5_m" type="text" id="x_5_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_5_m}}" {{ $peserta['x_5_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_5_h" type="text" id="x_5_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_5_h}}" {{ $peserta['x_5_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==5 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==5 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 6)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    6
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_6_m" type="text" id="x_6_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_6_m}}" {{ $peserta['x_6_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_6_h" type="text" id="x_6_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_6_h}}" {{ $peserta['x_6_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==6 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==6 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 7)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    7
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_7_m" type="text" id="x_7_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_7_m}}" {{ $peserta['x_7_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_7_h" type="text" id="x_7_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_7_h}}" {{ $peserta['x_7_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==7 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==7 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 8)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    8
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_8_m" type="text" id="x_8_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_8_m}}" {{ $peserta['x_8_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_8_h" type="text" id="x_8_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_8_h}}" {{ $peserta['x_8_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==8 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==8 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 9)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    9
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_9_m" type="text" id="x_9_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_9_m}}" {{ $peserta['x_9_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_9_h" type="text" id="x_9_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_9_h}}" {{ $peserta['x_9_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==9 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==9 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    @if($peserta->sesi_pretest >= 10)
                                    <form action="{{ route('user.submitPretest') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-1">
                                                <h1 class="" style="text-align: center;">
                                                    10
                                                </h1>
                                            </div>
                                            <div class="col-5 col-sm-4">
                                                <input name="x_10_m" type="text" id="x_10_m" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_10_m}}" {{ $peserta['x_10_m']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-5 col-sm-4 mb-2">
                                                <input name="x_10_h" type="text" id="x_10_h" class="form-control" placeholder="Masukkan Jawaban" value="{{ $peserta->x_10_h}}" {{ $peserta['x_10_h']=='' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==10 ? '' : 'disabled' }}>
                                                    <i class="far fa-save"></i>
                                                    <!-- Simpan -->
                                                </button>
                                                <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==null ? '' : 'disabled' }} {{ $peserta['sesi_pretest']==10 ? '' : 'disabled' }}>
                                                    Simpan
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                    <br>
                                    @endif

                                    <div class="row">
                                        <div class="col">
                                            <button data-toggle="modal" type="button" data-target="#konfirmasi" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                Selesai
                                            </button>
                                            <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                        </div>
                                    </div>

                                    <form method="get" enctype="multipart/form-data" action="{{ route('user.selesaiPretest') }}">
                                        <!-- Modal -->
                                        <div class=" modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h3 class="mt-3">Apakah Anda Yakin Mengakhiri Sesi Pretest ?</h3>
                                                    </div>
                                                    <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                                                    <div class="modal-footer">
                                                        <button type="submit" value="daftar" class="btn btn-md" style="color: white ; background-color: #707CAA; text-align: center">
                                                            Selesai
                                                        </button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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