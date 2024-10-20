@extends('admin/template/admin-template')

@section('title', 'Pendaftaran Baronas Admin | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pendaftaran</a></li>
                            </ol>
                        </nav> -->
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
                    <h1 class="card-img-top p-4" style="width: auto; margin: 0 auto;">UPDATE DATA PESERTA BARONAS</h1>
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                            <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                        </h5> -->

                        <div class="row">
                            <div class="col">

                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.actionTabelBaronasEdit') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Email Peserta (Jangan
                                                    diubah hubungi divisi web)</label>
                                                <input name="email" type="text" id="nomor-hp" class="form-control"
                                                    placeholder="Contoh : adarsangpejoeangcinta@gmail.com"
                                                    value="{{ $baronas->email }}" readOnly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Tim</label>
                                                <input name="nama_tim" type="text" id="nama-tim" class="form-control"
                                                    placeholder="Nama Tim" maxlength="15" value="{{ $baronas->nama_tim }}"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                <input name="nama_ketua" type="text" id="nama-ketua" class="form-control"
                                                    placeholder="Nama Lengkap" value="{{ $baronas->nama_ketua }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 1 (*jika
                                                    tidak ada silahkan isi '—')</label>
                                                <input name="nama_anggota" type="text" id="nama-anggota"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_anggota }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 2 (*jika
                                                    tidak ada silahkan isi '—')</label>
                                                <input name="nama_anggotadua" type="text" id="nama-anggotadua"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_anggotadua }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah/Instansi
                                                </label>
                                                <input name="sekolah" type="text" id="sekolah" class="form-control"
                                                    placeholder="Contoh : SMA Negeri 1 Surabaya"
                                                    value="{{ $baronas->sekolah }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah/Instansi
                                                </label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya"
                                                    value="{{ $baronas->alamat_sekolah }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nama Pembina</label>
                                                <input name="nama_pembina" type="text" id="nama-pembina"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_pembina }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP</label>
                                                <input name="nomor_hp" type="number" id="nomor-hp"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $baronas->nomor_hp }}" required>
                                            </div>

                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarelectra" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                Daftar
                                            </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaranAdmin"
                                                style="color: white; width: 100%; background-color: #1a174d">Edit</button>

                                            <div class="modal fade" id="submitPendaftaranAdmin" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Data sudah benar ?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-target="#daftarelectra" type="submit"
                                                                value="daftar" class="btn btn-md"
                                                                style="color: white; background-color: #1a174d">Edit</button>
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
