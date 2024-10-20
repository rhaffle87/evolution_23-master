@extends('/user/template/user-template-semifinal')

@section('title', 'Semifinal Tahap 2 | Evolution 2021')

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
                                    <h1>Tes Praktikum</h1>
                                    <i>Perhatikan soal yang ditampilkan di zoom</i>
                                    <br> <br>
                                    <form method="POST" enctype="multipart/form-data" action="">
                                        @csrf

                                        <div class="row mb-3">

                                            <div class="col">
                                                <h1>Rangkaian Listrik</h1>
                                            </div>

                                        </div>
                                        <form action="{{ route('user.submitPraktikum') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-1">
                                                    <h1 class="" style="text-align: center;">
                                                        1
                                                    </h1>
                                                </div>
                                                <div class="col">
                                                    @if($peserta->rl_a == null)
                                                    <textarea name="rl_a" type="textarea" id="password" class="form-control" placeholder="Masukkan Jawaban Anda" value=""></textarea>
                                                    @endif

                                                    @if($peserta->rl_a != null)
                                                    <textarea name="rl_a" type="textarea" id="password" class="form-control" placeholder="{{$peserta->rl_a}}" value="" readonly></textarea>
                                                    @endif
                                                </div>

                                                <div class="col-3">
                                                    <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['rl_a']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']==1 ? '' : 'disabled' }}>
                                                        <i class="far fa-save"></i>
                                                        <!-- Simpan -->
                                                    </button>
                                                    <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['rl_a']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']==1 ? '' : 'disabled' }}>
                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <form action="{{ route('user.submitPraktikum') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-1">
                                                    <h1 class="" style="text-align: center;">
                                                        2
                                                    </h1>
                                                </div>
                                                <div class="col">
                                                    @if($peserta->rl_b == null)
                                                    <textarea name="rl_b" type="textarea" id="password" class="form-control" placeholder="Masukkan Jawaban Anda" value=""></textarea>
                                                    @endif

                                                    @if($peserta->rl_b != null)
                                                    <textarea name="rl_b" type="textarea" id="password" class="form-control" placeholder="{{$peserta->rl_b}}" value="" readonly></textarea>
                                                    @endif
                                                </div>

                                                <div class="col-3">
                                                    <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['rl_b']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']==1 ? '' : 'disabled' }}>
                                                        <i class="far fa-save"></i>
                                                        <!-- Simpan -->
                                                    </button>
                                                    <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['rl_b']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']==1 ? '' : 'disabled' }}>

                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        @if($peserta->sesi_praktikum == 1)
                                        <form action="/semifinal/praktikum/lanjut" method="get">
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                        Lanjut Sesi Berikutnya
                                                    </button>
                                                    <i>Klik tombol di atas jika akan lanjut ke sesi berikutnya</i>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        @endif
                                        @if($peserta->sesi_praktikum > 1)
                                        <div class="row mb-3">

                                            <div class="col">
                                                <h1>Dasar Pemrograman</h1>
                                            </div>

                                        </div>
                                        <form action="{{ route('user.submitPraktikum') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-1">
                                                    <h1 class="" style="text-align: center;">
                                                        1
                                                    </h1>
                                                </div>
                                                <div class="col">
                                                    @if($peserta->dasprog_a == null)
                                                    <!-- <textarea name="dasprog_a" type="textarea" id="password" class="form-control" placeholder="Masukkan Jawaban Anda" value=""></textarea> -->
                                                    <input type="file" accept=".pdf" name="dasprog_a" id="password" class="form-control-file">
                                                    @endif

                                                    @if($peserta->dasprog_a != null)
                                                    <!-- <textarea name="dasprog_a" type="textarea" id="password" class="form-control" placeholder="{{$peserta->dasprog_a}}" value="" readonly></textarea> -->
                                                    <label for="dasprog_a">File sukses diunggah</label>
                                                    @endif
                                                </div>

                                                <div class="col-3">
                                                    <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['dasprog_a']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']>1 ? '' : 'disabled' }}>
                                                        <i class="far fa-save"></i>
                                                        <!-- Simpan -->
                                                    </button>
                                                    <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['dasprog_a']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']>1 ? '' : 'disabled' }}>

                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <form action="{{ route('user.submitPraktikum') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-1">
                                                    <h1 class="" style="text-align: center;">
                                                        2
                                                    </h1>
                                                </div>
                                                <div class="col">
                                                    @if($peserta->dasprog_b == null)
                                                    <!-- <textarea name="dasprog_b" type="textarea" id="password" class="form-control" placeholder="Masukkan Jawaban Anda" value=""></textarea> -->
                                                    <input type="file" accept=".pdf" name="dasprog_b" id="password" class="form-control-file">
                                                    @endif

                                                    @if($peserta->dasprog_b != null)
                                                    <!-- <textarea name="dasprog_b" type="textarea" id="password" class="form-control" placeholder="{{$peserta->dasprog_b}}" value="" readonly></textarea> -->
                                                    <label for="dasprog_b">File sukses diunggah</label>
                                                    @endif
                                                </div>

                                                <div class="col-3">
                                                    <button type="submit" value="daftar" class="btn btn-md d-md-none" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['dasprog_b']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']>1 ? '' : 'disabled' }}>
                                                        <i class="far fa-save"></i>
                                                        <!-- Simpan -->
                                                    </button>
                                                    <button type="submit" value="daftar" class="btn btn-md d-none d-md-block" style="color: white ;width: 100%; background-color: #707CAA; text-align: center" {{ $peserta['tahap']==1 ? '' : 'disabled' }} {{ $peserta['dasprog_b']==null ? '' : 'disabled' }} {{ $peserta['sesi_praktikum']>1 ? '' : 'disabled' }}>

                                                        Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>




                                    </form>
                                    <br>


                                    <div class="row">
                                        <div class="col">
                                            <button data-toggle="modal" type="button" data-target="#konfirmasi" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                Selesai
                                            </button>
                                            <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                        </div>
                                    </div>

                                    <form method="get" enctype="multipart/form-data" action="{{ route('user.selesaiPraktikum') }}">
                                        <!-- Modal -->
                                        <div class=" modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h3 class="mt-3">Apakah Anda Yakin Mengakhiri Sesi Praktikum ?</h3>
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
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    @endsection