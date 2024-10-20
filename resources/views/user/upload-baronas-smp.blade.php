@extends('user/template/user-template')

@section('title', 'Upload Link Video Baronas SMP | Evolution 2023')

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
                                <li class="breadcrumb-item"><a style="color: #172B4D">Upload Link Video Baronas Kategori
                                        SMP</a></li>
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

                        <div class="row">
                            <div class="col">

                                @if ($baronas['email'] != null && $baronas['kategori'] == 'SMP' && $baronas['link_video'])
                                    <div class="alert alert-success alert-block">
                                        File dan link yang anda upload telah tersimpan. Silahkan menunggu pengumuman lebih
                                        lanjut dari panitia. Semoga beruntung!
                                    </div>
                                @endif

                                @if ($baronas['pembayaran_status'] == 0 && $baronas['kategori'] == 'SMP' && $baronas['email'] != null)
                                    <div class="alert alert-warning alert-block">
                                        <strong>Segera lakukan pembayaran untuk mengupload file full paper dan link
                                            video</strong>
                                    </div>
                                @endif
                                @if (
                                    ($baronas['pembayaran_status'] == 1 || $baronas['pembayaran_status'] == 3) &&
                                        $baronas['kategori'] == 'SMP' &&
                                        $baronas['email'] != null)
                                    <div class="alert alert-warning alert-block">
                                        <strong>Harap tunggu, data Anda sedang dalam proses verifikasi oleh Admin</strong>
                                    </div>
                                @endif

                                @if ($baronas['email'] == null)
                                    <div class="alert alert-warning alert-block">
                                        <strong>Anda belum mendaftar lomba apapun</strong>
                                    </div>
                                @endif

                                @if ($baronas['email'] != null && $baronas['kategori'] != 'SMP')
                                    <div class="alert alert-warning alert-block">
                                        Anda tidak mendaftar kategori SMP. Silahkan pilih sesuai kategori lomba yang anda
                                        daftarkan.
                                    </div>
                                @endif

                                @if (
                                    ($baronas['pembayaran_status'] == 2 || $baronas['pembayaran_status'] == 4) &&
                                        $baronas['kategori'] == 'SMP' &&
                                        $baronas['email'] != null)
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="heading text-muted mb-4">Seleksi Video Baronas</h6>
                                            <form method="POST" enctype="multipart/form-data"
                                                action="{{ route('user.uploadBaronasSmp') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-name">Link Video</label>
                                                    <input type="text" id="link-video" name="link_video"
                                                        class="form-control" placeholder="Upload Link Video"
                                                        value="{{ $baronas->link_video }}"
                                                        {{ $baronas['link_video'] == '' ? '' : 'readOnly' }} required>
                                                </div>
                                                <!-- button type="submit" value="daftar" class="btn" style="color: white; width: 100%; background-color: #6EB648" {{ $baronas['email'] == '' ? '' : 'disabled' }}>Daftar</button> -->

                                                <button type="button" class="btn btn-md" data-toggle="modal"
                                                    data-target="#uploadFile"
                                                    style="color: white; width: 100%; background-color: #1a174d"
                                                    {{ $baronas['link_video'] == '' ? '' : 'disabled' }}>Daftar</button>

                                                <div class="modal fade" id="uploadFile" data-backdrop="static"
                                                    data-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h3 class="mt-3">Apakah Anda yakin data yang Anda masukkan
                                                                    sudah benar ?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-target="#uploadFile" type="submit"
                                                                    value="daftar" class="btn btn-md"
                                                                    style="color: white; background-color: #1a174d">Daftar</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                @endif
                                <!-- <div class="alert alert-default" role="alert">
                                    <strong>PENGUMUMAN</strong>
                                    <br><br>
                                    Bagi para calon pendaftar baronas kategori umum diharapkan dapat mengupload twibbon yang telah disediakan panitia
                                    <br>
                                    Twibbon dapat diakses pada link <a href="https://drive.google.com/drive/folders/1TXFcTLEGxSfQspnUAPc6h3tW56BhcNVo" style = "color:white;text-decoration:underline;">link</a> berikut
                                    <br><br>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
