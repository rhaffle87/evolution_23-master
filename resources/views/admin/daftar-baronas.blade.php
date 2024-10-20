@extends('admin/template/admin-template')

@section('title', 'Pendaftaran Baronas Admin | Evolution 2023')

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
                    <img src="/assets/img/brand/BARONAS.png" class="card-img-top p-2 logo-baronas" alt="Logo Baronas">
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
                                        <h6 class="heading text-muted mb-4">Pendaftaran Baronas</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('admin.daftarBaronas') }}">
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
                                                    placeholder="Nama Tim" maxlength="15" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kategori</label>
                                                <select name="kategori" id="kategori" class="form-control" required>
                                                    <option disabled selected value> -- Pilih Kategori -- </option>
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Atas</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                <input name="nama_ketua" type="text" id="nama-ketua" class="form-control"
                                                    placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 1 (*jika
                                                    tidak ada silahkan isi '—')</label>
                                                <input name="nama_anggota" type="text" id="nama-anggota"
                                                    class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 2 (*jika
                                                    tidak ada silahkan isi '—')</label>
                                                <input name="nama_anggotadua" type="text" id="nama-anggotadua"
                                                    class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah/Instansi
                                                </label>
                                                <input name="sekolah" type="text" id="sekolah" class="form-control"
                                                    placeholder="Contoh : SMA Negeri 1 Surabaya" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah/Instansi
                                                </label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nama Pembina</label>
                                                <input name="nama_pembina" type="text" id="nama-pembina"
                                                    class="form-control" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP</label>
                                                <input name="nomor_hp" type="number" id="nomor-hp"
                                                    class="form-control" placeholder="Contoh : 08123456789" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Unggah Kartu Pelajar/KTP/KK/Surat
                                                    Pernyataan (Format
                                                    jpg, jpeg) *contoh surat pernyataan dapat diunduh di : <a
                                                        href="https://intip.in/suratbaronas"
                                                        target="blank">intip.in/suratbaronas</a>
                                                    <br> <br>
                                                    Kartu Identitas Ketua (*Ukuran file maksikum 2MB)
                                                </label>

                                                <input name="file_ktp_ketua" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Kartu Identitas Anggota 1 (*Ukuran
                                                    file maksikum 2MB)</label>

                                                <input name="file_ktp_anggota" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran" required>

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Kartu Identitas Anggota 2 (*Ukuran
                                                    file maksikum 2MB)</label>

                                                <input name="file_ktp_anggotadua" accept="image/jpeg" type="file"
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
                                                    <option value="Kalimantan">Kalimantan</option>
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
