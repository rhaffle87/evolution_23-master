@extends('user/template/user-template')

@section('title', 'Pendaftaran Evolve | Evolution 2023')

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
                    <!-- <img src="/img/brand/TEXT_Evolve.png" class="card-img-top p-2" alt="Logo Evolve" style="width: 50%; margin: 0 auto;"> -->
                    <img src="/assets/img/homepage/logoEvolve.png" class="card-img-top p-3 logo-baronas" alt="Logo Evolve">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                <img src="/img/brand/TEXT_Evolve.png" alt="">
                            </h5> -->

                        <div class="row">
                            <div class="col">

                                @if ($evolve['pembayaran_status'] == 0 && $evolve['email'] != null)
                                    {{-- <div class="alert alert-success alert-block">
                                        Data pendaftaran telah tersimpan. Silahkan lakukan pembayaran pada menu pembayaran
                                    </div> --}}
                                    {{-- @if ($evolve['is_verified'] == 0)
                                    <div class="alert alert-success alert-block">
                                        Email verifikasi telah dikirimkan, jika tidak ada, dapat klik  
                                        <a
                                        href="{{ url('/user/daftar/evolve/resend') }}">Link ini
                                    </a>
                                    </div>
                                    @endif

                                    @if ($evolve['is_verified'] == 1)
                                    <div class="alert alert-success alert-block">
                                        Akun anda telah diverifikasi! Silahkan lakukan pembayaran. 
                                    </div>
                                    @endif --}}
                                    <div class="alert alert-success alert-block">
                                        Silahkan lakukan pembayaran. 
                                    </div>


                                @endif

                                @if ($evolve['pembayaran_status'] == 2 )
                                    <div class="alert alert-success alert-block">
                                        Anda telah berhasil terdaftar di <strong>Evolve 2023</strong>. 
                                        Silahkan cek email anda untuk tiket. 
                                    </div>
                                @endif

                                @if ($evolve['pembayaran_status'] == 1 )
                                    <div class="alert alert-success alert-block">
                                        Pembayaran sedang kami proses
                                    </div>
                                @endif

                                @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger">
                                        {{ $notification }}
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Evolve</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.daftarEvolve') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Lengkap</label>
                                                <input name="nama" type="text" id="nama" class="form-control"
                                                    placeholder="Nama Lengkap" value="{{ $evolve->nama }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-phone">Nomor Telepon
                                                    (WA)</label>
                                                <input name="no_telp" type="number" id="no_telp" class="form-control"
                                                    placeholder="Contoh : 628123456789" value="{{ $evolve->no_telp }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Universitas / Instansi </label>
                                                <input name="instansi" type="text" id="instansi" class="form-control"
                                                    placeholder="Contoh : Institut Teknologi Sepuluh Nopember"
                                                    value="{{ $evolve->instansi }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Band</label>
                                                <input name="nama_band" type="text" id="nama_band" class="form-control"
                                                    placeholder="Nama Band" value="{{ $evolve->nama_band }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 1</label>
                                                <input name="nama1" type="text" id="nama1" class="form-control"
                                                    placeholder="Nama Anggota 1" value="{{ $evolve->nama1 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 2</label>
                                                <input name="nama2" type="text" id="nama2" class="form-control"
                                                    placeholder="Nama Anggota 2" value="{{ $evolve->nama2 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 3</label>
                                                <input name="nama3" type="text" id="nama3" class="form-control"
                                                    placeholder="Nama Anggota 3" value="{{ $evolve->nama3 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 4</label>
                                                <input name="nama4" type="text" id="nama4" class="form-control"
                                                    placeholder="Nama Anggota 4" value="{{ $evolve->nama4 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 5</label>
                                                <input name="nama5" type="text" id="nama5" class="form-control"
                                                    placeholder="Nama Anggota 5" value="{{ $evolve->nama5 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }}required >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 6</label>
                                                <input name="nama6" type="text" id="nama6" class="form-control"
                                                    placeholder="Nama Anggota 6" value="{{ $evolve->nama6 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }}>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Nama Anggota 7</label>
                                                <input name="nama7" type="text" id="nama7" class="form-control"
                                                    placeholder="Nama Anggota 7" value="{{ $evolve->nama7 }}"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }}>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Unggah Identitas (Format PDF, max. 2MB)</label>
                                                <input name="scan" accept="application/pdf" type="file"
                                                    class="form-control-file" id="scan"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Bukti Follow Instagram @evolution.its (Format PDF, max. 2MB)</label>
                                                <input name="instagram" accept="application/pdf" type="file"
                                                    class="form-control-file" id="instagram"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Bukti Follow TikTok @evolution.its (Format PDF, max. 2MB)</label>
                                                <input name="tiktok" accept="application/pdf" type="file"
                                                    class="form-control-file" id="tiktok"
                                                    {{ $evolve['email'] == '' ? '' : 'readOnly' }} required>
                                            </div>

                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarevolve" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                    Daftar
                                                </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaran"
                                                style="color: white; width: 100%; background-color: #1a174d"
                                                {{ $evolve['email'] == '' ? '' : 'disabled'  }}
                                                >Daftar</button>

                                            <div class="modal fade" id="submitPendaftaran" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Data sudah benar ?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-target="#daftarevolve" type="submit"
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
