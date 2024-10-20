@extends('user/template/user-template')

@section('title', 'Pendaftaran Electra | Evolution 2023')

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
                    <!-- <img src="/img/brand/TEXT_ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                    <img src="/assets/img/homepage/logoElectra.png" class="card-img-top p-3 logo-baronas"
                        alt="Logo Electra">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                                                                <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                                                                            </h5> -->

                        <div class="row">
                            <div class="col">

                                @if ($electra['pembayaran_status'] == 0 && $electra['email'] != null)
                                    <div class="alert alert-success alert-block">
                                        Data pendaftaran telah tersimpan. Silahkan lakukan pembayaran pada menu pembayaran
                                    </div>
                                @endif

                                @if ($electra['pembayaran_status'] == 2 || $electra['pembayaran_status'] == 4)
                                    <div class="alert alert-success alert-block">
                                        Tim Anda telah berhasil terdaftar di <strong>ELECTRA 2023</strong>
                                    </div>
                                @endif

                                @if ($electra['pembayaran_status'] == 1 || $electra['pembayaran_status'] == 3)
                                    <div class="alert alert-success alert-block">
                                        Pembayaran sedang kami proses
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Electra</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.daftarElectra') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Tim
                                                    (KAPITAL)</label>
                                                <input name="nama_tim" type="text" id="nama-tim" class="form-control"
                                                    placeholder="Nama Tim" maxlength="15" value="{{ $electra->nama_tim }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua
                                                    (KAPITAL)</label>
                                                <input name="nama_ketua" type="text" id="nama-ketua" class="form-control"
                                                    placeholder="Nama Lengkap" value="{{ $electra->nama_ketua }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas</label>
                                                @if ($electra->kelas_ketua == null)
                                                    <select name="kelas_ketua" id="kelas-ketua" class="form-control"
                                                        {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                                        <option disabled selected value> -- Pilih Kelas -- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_ketua != null)
                                                    <input name="kelas_ketua" type="text" id="kelas-ketua"
                                                        class="form-control" placeholder="Kelas Ketua"
                                                        value="{{ $electra->kelas_ketua }}"
                                                        {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota (KAPITAL
                                                    *jika hanya 1 peserta silahkan isi '—' pada bagian anggota)</label>
                                                <input name="nama_anggota" type="text" id="nama-anggota"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $electra->nama_anggota }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Kelas </label>
                                                @if ($electra->kelas_anggota == null)
                                                    <select name="kelas_anggota" id="kelas-ketua" class="form-control"
                                                        {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                                        <option disabled selected value> -- Pilih Kelas-- </option>
                                                        <option value="10">Kelas X</option>
                                                        <option value="11">Kelas XI</option>
                                                        <option value="12">Kelas XII</option>
                                                        <option value="-">—</option>
                                                    </select>
                                                @endif

                                                @if ($electra->kelas_anggota != null)
                                                    <input name="kelas_anggota" type="text" id="kelas-anggota"
                                                        class="form-control" placeholder="Kelas Anggota"
                                                        value="{{ $electra->kelas_anggota }}"
                                                        {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah </label>
                                                <input name="sekolah" type="text" id="sekolah" class="form-control"
                                                    placeholder="Contoh : SMA Negeri 1 Surabaya"
                                                    value="{{ $electra->sekolah }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah </label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya"
                                                    value="{{ $electra->alamat_sekolah }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP Ketua</label>
                                                <input name="nomor_hp_ketua" type="number" id="nomor-hp-ketua"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $electra->nomor_hp_ketua }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP
                                                    Anggota</label>
                                                <input name="nomor_hp_anggota" type="number" id="nomor-hp-anggota"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $electra->nomor_hp_anggota }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Bukti Upload Twibbon
                                                    Ketua</label>
                                                <input name="bukti_upload_twibbon_ketua" type="text"
                                                    id="twibbon-ketua" class="form-control"
                                                    placeholder="Contoh : www.instagram.com/xxxxx"
                                                    value="{{ $electra->bukti_upload_twibbon_ketua }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
                                                <small>Masukkan linknya saja</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Bukti Upload Twibbon
                                                    Anggota</label>
                                                <input name="bukti_upload_twibbon_anggota" type="text"
                                                    id="twibbon-ketua" class="form-control"
                                                    placeholder="Contoh : www.instagram.com/xxxxx"
                                                    value="{{ $electra->bukti_upload_twibbon_anggota }}"
                                                    {{ $electra['email'] == '' ? '' : 'readOnly' }} required>
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

                                                @if ($electra->file_ktp_ketua == null)
                                                    <input name="file_ktp_ketua" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran"
                                                        {{ $electra['email'] == '' ? '' : 'disabled' }} required>
                                                @endif

                                                @if ($electra->file_ktp_ketua != null)
                                                    <br>
                                                    <button disabled>File sudah tersimpan</button>
                                                    <!-- <p>{{ $electra->file_ktp_ketua }}</p> -->
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Kartu Identitas Anggota (*Ukuran file
                                                    maksikum 2MB)</label>

                                                @if ($electra->file_ktp_anggota == null)
                                                    <input name="file_ktp_anggota" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran"
                                                        {{ $electra['email'] == '' ? '' : 'disabled' }} required>
                                                @endif

                                                @if ($electra->file_ktp_anggota != null)
                                                    <br>
                                                    <button disabled>File sudah tersimpan</button>
                                                    <!-- <p>{{ $electra->file_ktp_ketua }}</p> -->
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Region</label>
                                                <select name="region" id="kelas-ketua" class="form-control" required>
                                                    <option disabled selected value> -- Pilih Region -- </option>
                                                    <option value="Jabodetabek">Jabodetabek</option>
                                                    <option value="Banyuwangi">Banyuwangi</option>
                                                    <option value="Madiun">Madiun</option>
                                                    <option value="Kalimantan">Kalimantan</option>
                                                    <option value="Tuban">Tuban</option>
                                                    <option value="Semarang">Semarang</option>
                                                    <option value="Sumatera">Sumatera</option>
                                                    <option value="Malang">Malang</option>
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Sidoarjo">Sidoarjo</option>
                                                    <option value="Bali">Bali</option>
                                                    <option value="Gresik">Gresik</option>
                                                    <option value="Jember">Jember</option>
                                                    <option value="Kediri">Kediri</option>
                                                    <option value="Mojokerto">Mojokerto</option>
                                                    <option value="Madura">Madura</option>
                                                    <option value="Probolinggo">Probolinggo</option>
                                                    <option value="Solo">Solo</option>
                                                    <option value="Non-Region">Non-Region (Lombok, Sulawesi, Papua)
                                                    </option>
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaran"
                                                style="color: white; width: 100%; background-color: #1a174d">Daftar</button>

                                            <div class="modal fade" id="submitPendaftaran" data-backdrop="static"
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
