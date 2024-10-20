@extends('admin/template/admin-template')

@section('title', 'Pendaftaran Electra Admin | Evolution 2023')

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
                    <!--img src="http:evolution-its.com/storage/x3qtnBbtsCdNNZKVGfuj1cPXarayEbFS2s4BT2eG.jpg" class="card-img-top p-2" alt="Logoo Electra" style="width: 50%; margin: 0 auto;"-->
                    <img src="/assets/img/homepage/logoElectra.png" class="card-img-top p-3 logo-baronas"
                        alt="Logo Electra">
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
                                        <h6 class="heading text-muted mb-4">Pendaftaran Electra</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.daftarElectra') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Email Peserta</label>
                                                <input name="email" type="text" id="nomor-hp" class="form-control"
                                                    placeholder="Contoh : adarsangpejoeangcinta@gmail.com" value=""
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Tim</label>
                                                <input name="nama_tim" type="text" id="nama-tim" class="form-control"
                                                    placeholder="Nama Tim" maxlength="25" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                <input name="nama_ketua" type="text" id="nama-ketua" class="form-control"
                                                    placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas</label>
                                                <select name="kelas_ketua" id="kelas-ketua" class="form-control"required>
                                                    <option disabled selected value> -- Pilih Kelas -- </option>
                                                    <option value="10">Kelas X</option>
                                                    <option value="11">Kelas XI</option>
                                                    <option value="12">Kelas XII</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota (*jika hanya
                                                    1 peserta silahkan isi '—' pada bagian anggota)</label>
                                                <input name="nama_anggota" type="text" id="nama-anggota"
                                                    class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas </label>
                                                <select name="kelas_anggota" id="kelas-ketua" class="form-control" required>
                                                    <option disabled selected value> -- Pilih Kelas-- </option>
                                                    <option value="10">Kelas X</option>
                                                    <option value="11">Kelas XI</option>
                                                    <option value="12">Kelas XII</option>
                                                    <option value="-">—</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah </label>
                                                <input name="sekolah" type="text" id="sekolah" class="form-control"
                                                    placeholder="Contoh : SMA Negeri 1 Surabaya" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah </label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP Ketua</label>
                                                <input name="nomor_hp_ketua" type="number" id="nomor-hp-ketua"
                                                    class="form-control" placeholder="Contoh : 08123456789" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP
                                                    Anggota</label>
                                                <input name="nomor_hp_anggota" type="number" id="nomor-hp-anggota"
                                                    class="form-control" placeholder="Contoh : 08123456789" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Bukti Upload Twibbon
                                                    Ketua</label>
                                                <input name="bukti_upload_twibbon_ketua" type="text"
                                                    id="twibbon-ketua" class="form-control"
                                                    placeholder="Contoh : www.instagram.com/xxxxx" required>
                                                <small>Masukkan linknya saja</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Bukti Upload Twibbon
                                                    Anggota</label>
                                                <input name="bukti_upload_twibbon_anggota" type="text"
                                                    id="twibbon-ketua" class="form-control"
                                                    placeholder="Contoh : www.instagram.com/xxxxx" required>
                                                <small>Masukkan linknya saja</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Unggah Kartu Pelajar/KTP/KK/Surat
                                                    Pernyataan (Format
                                                    jpg, jpeg) *contoh surat pernyataan dapat diunduh di : <a
                                                        href="https://intip.in/suratelectra"
                                                        target="blank">intip.in/suratelectra</a>
                                                    <br> <br>
                                                    Kartu Identitas Ketua (*Ukuran file maksikum 2MB)
                                                </label>

                                                <input name="file_ktp_ketua" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Kartu Identitas Anggota (*Ukuran file
                                                    maksikum 2MB)</label>

                                                <input name="file_ktp_anggota" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran" required>

                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Region</label>
                                                <select name="region" id="kelas-ketua" class="form-control" required>
                                                    <option disabled selected value> -- Pilih Region -- </option>
                                                    <option value="Jabodetabek">Jabodetabek</option>
                                                    <option value="Banyuwangi">Banyuwangi</option>
                                                    <option value="Madiun">Madiun</option>
                                                    <option value="Tuban">Tuban</option>
                                                    <option value="Semarang">Semarang</option>
                                                    <option value="Malang">Malang</option>
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Sidoarjo">Sidoarjo</option>
                                                    <option value="Bali">Bali</option>
                                                    <option value="Gresik">Gresik</option>
                                                    <option value="Balikpapan">Balikpapan</option>
                                                    <option value="Jember">Jember</option>
                                                    <option value="Kediri">Kediri</option>
                                                    <option value="Mojokerto">Mojokerto</option>
                                                    <option value="Madura">Madura</option>
                                                    <option value="Probolinggo">Probolinggo</option>
                                                    <option value="Solo">Solo</option>
                                                </select>
                                            </div>

                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarelectra" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                                        Daftar
                                                                    </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaranAdmin"
                                                style="color: white; width: 100%; background-color: #1a174d">Daftarkan</button>

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