@extends('user/template/user-template')

@section('title', 'Pembayaran Evolve | Evolution 2023')

@section('container')

    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pembayaran</a></li>
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
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                            <img src="/img/brand/TEXT_EVOLVE.png" alt="">
                            <!-- LOGO Evolve -->
                        </h5>

                        <div class="row">
                            <div class="col">


                                @if ($evolve['pembayaran_status'] == 0 && $evolve['email'] != null)
                                    <div class="alert alert-default" role="alert">
                                        Silahkan lakukan pembayaran sebesar <strong>Rp150.000</strong> ke salah satu
                                        rekening
                                        tercantum
                                        <br><br>
                                        <strong>Mandiri</strong>
                                        <br>
                                        1400021278305 
                                        <br>
                                        a.n ISNUANSA MAHARANI PU
                                        <br><br>
                                        <strong>Dana, OVO</strong>
                                        <br>
                                        081232444947
                                        <br>
                                        a.n ISNUANSA MAHARANI PU
                                    </div>
                                @endif

                                @if ($evolve['pembayaran_status'] == 1 && $evolve['email'] != null)
                                    <div class="alert alert-warning alert-block">
                                        Pembayaran sedang kami proses, maksimal dalam 3x24 jam
                                    </div>
                                @endif

                                @if ($evolve['pembayaran_status'] == 2 && $evolve['email'] != null)
                                    <div class="alert alert-success alert-block">
                                        Pembayaran Anda telah kami verifikasi, silahkan cek email anda.
                                    </div>
                                @endif

                                @if ($evolve['email'] == null)
                                    <div class="alert alert-warning alert-block">
                                        <strong>Anda belum mendaftar lomba apapun</strong>
                                    </div>
                                @endif

                                @if ($evolve['email'] != null)
                                    <div class="card">
                                        <div class="card-body">

                                            <h6 class="heading text-muted mb-4">Konfirmasi Pembayaran</h6>
                                            <form action="{{ route('user.bayarEvolve') }}" enctype="multipart/form-data"
                                                method="POST" id="pilihan-pembayaran">
                                                @csrf


                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Metode
                                                        Pembayaran</label>
                                                    <select name="bank_tujuan" class="custom-select custom-select-lg mb-3"
                                                        {{ $evolve['pembayaran_status'] == 0 ? '' : 'disabled' }} required>
                                                        <option hidden disabled selected>-- Pilih Metode Pembayaran --
                                                        </option>
                                                        <option value="Mandiri">Bank Mandiri</option>
                                                        <option value="Dana">Dana</option>
                                                        <option value="OVO">OVO</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Nama
                                                        Pengirim</label>
                                                    <input name="nama_pengirim" type="text" id="bank-account-number"
                                                        class="form-control" placeholder="Nama Pengirim"
                                                        value="{{ $evolve->pembayaran_atas_nama }}"
                                                        {{ $evolve['pembayaran_status'] == 0 ? '' : 'readOnly' }} required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Unggah Bukti Pembayaran (Format
                                                        jpg,
                                                        jpeg; max. 2MB)</label>
                                                    <input name="file_bukti" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran"
                                                        {{ $evolve['pembayaran_status'] == 0 ? '' : 'disabled' }} required multiple>
                                                </div>

                                                <button type="submit" value="pembayaran" class="btn text-lighter"
                                                    style="width: 100%; background-color: #264579;"
                                                    {{ $evolve['pembayaran_status'] == 0 ? '' : 'disabled' }}>Submit</button>
                                                <hr class="my-4" />
                                            </form>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
