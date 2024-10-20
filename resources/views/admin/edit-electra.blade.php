@extends('admin/template/admin-template')

@section('title', 'Edit Electra Admin | Evolution 2023')

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
                                <li class="breadcrumb-item"><a style="color: #172B4D">Edit Akun Peserta</a></li>
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
                    <!-- <img src="/img/brand/TEXT_ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                            <img src="/img/brand/TEXT_ELECTRA.png" alt="">
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
                                        <h6 class="heading text-muted mb-4">Edit Akun Peserta Electra</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.editElectra') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Email Peserta</label>
                                                <input name="email" type="text" id="nomor-hp" class="form-control"
                                                    placeholder="Contoh : adarsangpejoeangcinta@gmail.com"
                                                    value="{{ $electra->email }}" readOnly>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Tim</label>
                                                <input name="nama_tim" type="text" id="nama-tim" class="form-control"
                                                    placeholder="Nama Tim" maxlength="15" value="{{ $electra->nama_tim }}"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                <input name="nama_ketua" type="text" id="nama-ketua" class="form-control"
                                                    placeholder="Nama Lengkap" value="{{ $electra->nama_ketua }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas</label>

                                                @if ($electra->kelas_ketua == 10)
                                                    <select name="kelas_ketua" id="kelas-ketua" class="form-control"
                                                        required>
                                                        <option disabled value> -- Pilih Kelas -- </option>
                                                        <option selected value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_ketua == 11)
                                                    <select name="kelas_ketua" id="kelas-ketua" class="form-control"
                                                        required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option selected value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_ketua == 12)
                                                    <select name="kelas_ketua" id="kelas-ketua" class="form-control"
                                                        required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option selected value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota (*jika hanya
                                                    1 peserta silahkan isi '—' pada bagian anggota)</label>
                                                <input name="nama_anggota" type="text" id="nama-anggota"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $electra->nama_anggota }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas </label>
                                                @if ($electra->kelas_anggota == 10)
                                                    <select name="kelas_anggota" id="kelas-anggota" class="form-control"
                                                        required>
                                                        <option disabled value> -- Pilih Kelas -- </option>
                                                        <option selected value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_anggota == 11)
                                                    <select name="kelas_anggota" id="kelas-anggota" class="form-control"
                                                        required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option selected value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_anggota == 12)
                                                    <select name="kelas_anggota" id="kelas-anggota" class="form-control"
                                                        required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option selected value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_anggota == '-')
                                                    <select name="kelas_anggota" id="kelas-anggota" class="form-control"
                                                        required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                        <option selected value="-">-</option>
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah </label>
                                                <input name="sekolah" type="text" id="sekolah" class="form-control"
                                                    placeholder="Contoh : SMA Negeri 1 Surabaya"
                                                    value="{{ $electra->sekolah }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah </label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya"
                                                    value="{{ $electra->alamat_sekolah }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP Ketua</label>
                                                <input name="nomor_hp_ketua" type="number" id="nomor-hp-ketua"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $electra->nomor_hp_ketua }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP
                                                    Anggota</label>
                                                <input name="nomor_hp_anggota" type="number" id="nomor-hp-anggota"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $electra->nomor_hp_anggota }}" required>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarelectra" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                Daftar
                                            </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaranAdmin"
                                                style="color: white; width: 100%; background-color: #1a174d">Update</button>

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
