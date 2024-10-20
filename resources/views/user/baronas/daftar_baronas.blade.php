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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12" style="width: 100%;">
                <div class="card" style="width: 100%;">
                    <!-- <img src="/img/brand/TEXT_ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                    <img src="/assets/img/homepage/logoBaronas.png" class="card-img-top p-3 logo-baronas"
                        alt="Logo Baronas">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                                                                                                                                        <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                                                                                                                                                    </h5> -->

                        <div class="row">
                            <div class="col">

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Paper Baronas</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.daftarPaperBaronas') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_ketua" class="form-control-label">
                                                    Nama Ketua
                                                </label>
                                                <input type="text" name="nama_ketua" id="nama_ketua"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_anggota_1" class="form-control-label">
                                                    Nama Anggota 1
                                                </label>
                                                <input type="text" name="nama_anggota_1" id="nama_anggota_1"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_anggota_2" class="form-control-label">
                                                    Nama Anggota 2
                                                </label>
                                                <input type="text" name="nama_anggota_2" id="nama_anggota_2"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="asal_sekolah" class="form-control-label">
                                                    Nama Sekolah
                                                </label>
                                                <input type="text" name="asal_sekolah" id="asal_sekolah"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_sekolah" class="form-control-label">
                                                    Alamat Sekolah
                                                </label>
                                                <input type="text" name="alamat_sekolah" id="alamat_sekolah"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pembina" class="form-control-label">
                                                    Nama Pembina
                                                </label>
                                                <input type="text" name="nama_pembina" id="nama_pembina"
                                                    placeholder="Nama Pembina" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <small>*Pastikan nomor dapat dihubungi</small>
                                                <label for="no_hp" class="form-control-label">
                                                    Nomor Hp
                                                </label>
                                                <input type="text" name="no_hp" id="no_hp" placeholder="Nomor Hp"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="judul" class="form-control-label">
                                                    Judul
                                                </label>
                                                <input type="text" name="judul" id="judul" placeholder="Judul"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="subtema" class="form-control-label">
                                                    Sub Tema
                                                </label>
                                                <select name="subtema" id="subtema" class="jform-control">
                                                    <option value="Renewable Energy">Renewable Energy</option>
                                                    <option value="Health">Health</option>
                                                    <option value="Digitalization">Digitalization</option>
                                                    <option value="Internet of Things">Internet of Things</option>
                                                    <option value="Environment">Environment</option>
                                                </select>
                                            </div>
                                            {{-- - File uploads- --}}
                                            {{-- upload ktp --}}
                                            <div class="form-group">
                                                <label for="ktp_ketua" class="form-control-label">
                                                    Upload KTP Ketua
                                                </label>
                                                <input type="file" name="ktp_ketua" id="ktp_ketua"
                                                    class="form-control" accept="image/*" />
                                            </div>
                                            {{-- upload ktp anggota 1 --}}
                                            <div class="form-group">
                                                <label for="ktp_anggota_1" class="form-control-label">
                                                    Upload KTP Anggota 1
                                                </label>
                                                <input type="file" name="ktp_anggota_1" id="ktp_anggota_1"
                                                    class="form-control" accept="image/*" />
                                            </div>
                                            {{-- upload ktp anggota 2 --}}
                                            <div class="form-group">
                                                <label for="ktp_anggota_2" class="form-control-label">
                                                    Upload KTP Anggota 2
                                                </label>
                                                <input type="file" name="ktp_anggota_2" id="ktp_anggota_2"
                                                    class="form-control" accept="image/*" />
                                            </div>
                                            <div class="form-group">
                                                <label for="file_paper" class="form-control-label">
                                                    Upload File Abstrak
                                                </label>
                                                <input type="file" name="file_paper" id="file_paper"
                                                    class="form-control" accept=".pdf" />
                                                <small>Maksimal 1 MB</small>
                                            </div>
                                            {{-- submit --}}
                                            <button type="submit" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaran"
                                                style="color: white; width: 100%; background-color: #1a174d">Daftar</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
