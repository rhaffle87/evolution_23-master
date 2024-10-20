@extends('user/template/user-template')

@section('title', 'Form Baronas SMA | Evolution 2023')

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
                                <li class="breadcrumb-item"><a style="color: #172B4D">Formulir Pendaftaran Baronas Kategori
                                        SMA</a></li>
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

                                @if ($baronas['pembayaran_status'] == 0 && $baronas['email'] != null)
                                    <div class="alert alert-success alert-block">
                                        Data pendaftaran telah tersimpan. Silahkan lakukan pembayaran pada menu pembayaran
                                    </div>
                                @endif

                                @if ($baronas['pembayaran_status'] == 2 || $baronas['pembayaran_status'] == 4)
                                    <div class="alert alert-success alert-block">
                                        Tim Anda telah berhasil terdaftar di <strong>BARONAS 2023</strong>
                                    </div>
                                @endif

                                @if ($baronas['pembayaran_status'] == 1 || $baronas['pembayaran_status'] == 3)
                                    <div class="alert alert-success alert-block">
                                        Pembayaran sedang kami proses
                                    </div>
                                @endif

                                @if ($notification = Session::get('wrong-file'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $notification }}</strong>
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

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Baronas</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.daftarBaronasSma') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Tim</label>
                                                <input type="text" id="nama-tim" name="nama_tim" class="form-control"
                                                    placeholder="Nama Tim" value="{{ $baronas->nama_tim }}" maxlength="50"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }}>
                                            </div>
                                            <!-- <div class="form-group">
                                                            <label class="form-control-label" for="input-name">Kategori</label>
                                                            <select name="kategori" id="kategori" class="form-control">
                                                                <option disabled selected value> -- Pilih Kategori -- </option>
                                                                <option value="SD">Sekolah Dasar</option>
                                                                <option value="SMP">Sekolah Menengah Pertama</option>
                                                                <option value="SMA">Sekolah Menengah Atas</option>
                                                                <option value="UMUM">Umum</option>
                                                            </select>
                                                        </div> -->
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                <input type="text" id="nama-ketua" class="form-control" name="nama_ketua"
                                                    placeholder="Nama Lengkap" value="{{ $baronas->nama_ketua }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <!--  <div class="form-group">
                                                            <label class="form-control-label" for="input-name">Kelas ( <span class="red-star" style = "color:red">**</span> jika memilih kategori umum, tidak usah diisi <span class="red-star" style = "color:red">**</span>)</label>
                                                            <select name="kelas_ketua" id="kelas-ketua" class="form-control" required>
                                                                <option disabled selected value> -- Pilih Kelas -- </option>
                                                                <option value="10">Kelas X</option>
                                                                <option value="11">Kelas XI</option>
                                                                <option value="12">Kelas XII</option>
                                                            </select>
                                                        </div> -->
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 1</label>
                                                <input type="text" id="nama-anggota" name="nama_anggota"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_anggota }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }}>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 2</label>
                                                <input type="text" id="nama-anggotadua" name="nama_anggotadua"
                                                    class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_anggotadua }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }}>
                                            </div>


                                            <!--   <div class="form-group">
                                                            <label class="form-control-label" for="input-name">Kelas (<span class="red-star" style = "color:red">**</span> jika memilih kategori umum, tidak usah diisi <span class="red-star" style = "color:red">**</span> )</label>
                                                            <select name="kelas_ketua" id="kelas-ketua" class="form-control" required>
                                                                <option disabled selected value> -- Pilih Kelas -- </option>
                                                                <option value="10">Kelas X</option>
                                                                <option value="11">Kelas XI</option>
                                                                <option value="12">Kelas XII</option>
                                                            </select>
                                                        </div> -->



                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Asal Sekolah / Instansi
                                                    Ketua</label>
                                                <input name="sekolah" type="text" name="sekolah" id="sekolah"
                                                    class="form-control" placeholder="Contoh : SMA Negeri 1 Surabaya"
                                                    value="{{ $baronas->sekolah }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Alamat Sekolah /
                                                    Instansi Ketua</label>
                                                <input name="alamat_sekolah" type="text" id="alamat-sekolah"
                                                    class="form-control"
                                                    placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya"
                                                    value="{{ $baronas->alamat_sekolah }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Pembina ( <span
                                                        class="red-star" style="color:red">**</span> Jika tidak ada
                                                    pembina, tolong kasih " - " <span class="red-star"
                                                        style="color:red">**</span> )</label>
                                                <input name="nama_pembina" type="text" name="nama_pembina"
                                                    id="Pembina" class="form-control" placeholder="Nama Lengkap"
                                                    value="{{ $baronas->nama_pembina }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor HP</label>
                                                <input name="nomor_hp" type="number" id="nomor-hp"
                                                    class="form-control" placeholder="Contoh : 08123456789"
                                                    value="{{ $baronas->nomor_hp }}"
                                                    {{ $baronas['email'] == '' ? '' : 'readOnly' }} required>
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
                                                    class="form-control-file" id="bukti-pendaftaran"
                                                    {{ $baronas['email'] == '' ? '' : 'disabled' }} required>
                                            </div>



                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Unggah Kartu Identitas Anggota 1
                                                    (Format jpg, jpeg) ( <span class="red-star"
                                                        style="color:red">**</span>
                                                    Jika tidak ada anggota, tolong upload kartu identitas ketua<span
                                                        class="red-star" style="color:red">**</span> )</label>
                                                <input name="file_ktp_anggota" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran"
                                                    {{ $baronas['email'] == '' ? '' : 'disabled' }} required>
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Unggah Kartu Identitas Anggota 2
                                                    (Format jpg, jpeg) ( <span class="red-star"
                                                        style="color:red">**</span>
                                                    Jika tidak ada anggota, tolong upload kartu identitas ketua<span
                                                        class="red-star" style="color:red">**</span> ) </label>
                                                <input name="file_ktp_anggotadua" accept="image/jpeg" type="file"
                                                    class="form-control-file" id="bukti-pendaftaran"
                                                    {{ $baronas['email'] == '' ? '' : 'disabled' }} required>
                                            </div>

                                            <!-- button type="submit" value="daftar" class="btn" style="color: white; width: 100%; background-color: #6EB648" {{ $baronas['email'] == '' ? '' : 'disabled' }}>Daftar</button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaran"
                                                style="color: white; width: 100%; background-color: #1a174d"
                                                {{ $baronas['email'] == '' ? '' : 'disabled' }}>Daftar</button>

                                            <div class="modal fade" id="submitPendaftaran" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Apakah Anda yakin data yang Anda masukkan
                                                                sudah benar ?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-target="#daftarBaronasUmum" type="submit"
                                                                value="daftar" class="btn btn-md"
                                                                style="color: white; background-color: #1a174d">Daftar</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--

                                                        <button data-target="#daftarbaronas" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA">
                                                            Daftar
                                                        </button>
                                                    -->

                                            <!-- Modal -->
                                            <!--
                                                           <div class="modal fade" id="daftarbaronas" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">Evolution 2021
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: center;">
                                                                        <i class="fas fa-question-circle fa-10x" style="color: #707CAA;"></i>
                                                                        <br>
                                                                        <h3 class="mt-3">Data Sudah Benar ?</h3>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="button" class="btn" style="background-color: #707CAA; color: white">Benar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    -->






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
