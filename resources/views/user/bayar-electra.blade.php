@extends('user/template/user-template')

@section('title', 'Pembayaran Electra | Evolution 2023')

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
                            <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                            <!-- LOGO ELECTRA -->
                        </h5>


                        @if ($electra['pembayaran_status'] == 0 && $electra['email'] != null)
                            <div class="alert alert-default" role="alert">
                                <!-- 70.000 + 100 + 2 least unique ID -->
                                Silahkan lakukan pembayaran sebesar <strong>Rp
                                    100.{{ 100 + ($electra['id'] % 100) }} (jika 1 tim)</strong> Atau <strong>Rp
                                    280.{{ 100 + ($electra['id'] % 100) }} (jika 3 tim)</strong> ke salah satu rekening
                                tercantum
                                <br><br>
                                <strong>Mandiri</strong>
                                <br>
                                1400021255121
                                <br>
                                a.n SABRINA QOLBU PRADIP
                                <br>
                                <strong>==========</strong>
                                <br>
                                <strong>DANA</strong>
                                <br>
                                081938034043
                                <br>
                                a.n Nadhifah Dini Shabrina
                                <br>
                            </div>
                        @endif

                        @if ($electra['pembayaran_status'] == 1 && $electra['email'] != null)
                            <div class="alert alert-warning alert-block">
                                Pembayaran sedang kami proses, maksimal dalam 2x24 jam
                            </div>
                        @endif

                        @if (($electra['pembayaran_status'] == 2 || $electra['pembayaran_status'] == 4) && $electra['email'] != null)
                            <div class="alert alert-success alert-block">
                                Pembayaran Anda telah berhasil kami terima, silahkan cetak kartu peserta.
                            </div>
                        @endif

                        @if ($electra['pembayaran_status'] == 3 && $electra['email'] != null)
                            <div class="alert alert-warning alert-block">
                                Verifikasi sedang kami proses
                            </div>
                        @endif

                        @if ($electra['email'] == null)
                            <div class="alert alert-warning alert-block">
                                <strong>Anda belum mendaftar lomba apapun</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    @if ($electra['email'] != null)
                        <!-- Page content -->
                        <!-- Card header -->
                        <div class="card-header border-0">

                            <h1 class="mb-0">PEMBAYARAN</h1>
                        </div>
                        <ul class="nav nav-tabs mx-4" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="satu-tim-tab" data-toggle="tab" href="#satu-tim"
                                    role="tab" aria-controls="home" aria-selected="false"><b>Bayar Satu
                                        Tim</b></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tiga-tim-tab" data-toggle="tab" href="#tiga-tim" role="tab"
                                    aria-controls="profile" aria-selected="false"><b>Bayar
                                        Tiga
                                        Tim</b></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="satu-tim" role="tabpanel"
                                aria-labelledby="satu-tim-tab">
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center ">
                                        <div class="media-body p-4">
                                            <h6 class="heading text-muted mb-4">Konfirmasi
                                                Pembayaran</h6>

                                            <form action="{{ route('user.bayarElectra') }}" enctype="multipart/form-data"
                                                method="POST" id="pilihan-pembayaran">
                                                @csrf
                                                <div class="form-control-label">
                                                    <label for="input-total-team" class="form-control-label">Jumlah
                                                        tim</label>
                                                    <input type="text" value="1" name="total_team"
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Bank
                                                        Tujuan</label>
                                                    <select name="bank_tujuan" class="custom-select custom-select-lg mb-3"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }} required>
                                                        <option hidden disabled selected>-- Pilih
                                                            Bank --
                                                        </option>
                                                        <option value="Bank Mandiri">Bank Mandiri
                                                        </option>
                                                        <option value="DANA">DANA</option>
                                                        <option disabled>---</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Nama
                                                        Pengirim</label>
                                                    <input name="nama_pengirim" type="text" id="bank-account-number"
                                                        class="form-control" placeholder="Nama Pengirim"
                                                        value="{{ $electra->pembayaran_atas_nama }}"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'readOnly' }} required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Unggah
                                                        Bukti
                                                        Pembayaran (Format
                                                        jpg, jpeg)</label>
                                                    <input name="file_bukti" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }} required>
                                                </div>

                                                <button type="submit" value="pembayaran" class="btn text-lighter"
                                                    style="width: 100%; background-color: #264579;"
                                                    {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }}>Submit</button>
                                                <hr class="my-4" />
                                            </form>
                                        </div>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="tiga-tim" role="tabpanel"
                                aria-labelledby="tiga-tim-tab">
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center ">
                                        <div class="media-body p-4">
                                            <h6 class="heading text-muted mb-4">Konfirmasi
                                                Pembayaran</h6>
                                            <form action="{{ route('user.bayarElectra') }}" enctype="multipart/form-data"
                                                method="POST" id="pilihan-pembayaran">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="input-total-team" class="form-control-label">Jumlah
                                                        tim</label>
                                                    <input type="text" value="3" name="total_team"
                                                        class="form-control" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Bank
                                                        Tujuan</label>
                                                    <select name="bank_tujuan" class="custom-select custom-select-lg mb-3"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }} required>
                                                        <option hidden disabled selected>-- Pilih
                                                            Bank --
                                                        </option>
                                                        <option value="Bank Mandiri">Bank Mandiri
                                                        </option>
                                                        <option value="DANA">DANA</option>
                                                        <option disabled>---</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Nama
                                                        Pengirim</label>
                                                    <input name="nama_pengirim" type="text" id="bank-account-number"
                                                        class="form-control" placeholder="Nama Pengirim"
                                                        value="{{ $electra->pembayaran_atas_nama }}"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'readOnly' }}
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_tim_1" class="form-control-label">Tim
                                                        1</label>
                                                    {{-- <input type="text" name="nama_tim_1" placeholder="{{ $electra->nama_tim }}"
                                                        value={{ $electra->id }} class="form-control" readOnly> --}}
                                                    <select name="nama_tim_1" id=""
                                                        class="custom-select custom-select-lg mb-3">
                                                        <option value="{{ $electra->id }}" selected>
                                                            {{ $electra->nama_tim }}</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_tim_2" class="form-control-label">Tim
                                                        2</label>
                                                    <select name="nama_tim_2" class="custom-select custom-select-lg mb-3"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }}
                                                        required>
                                                        <option hidden disabled selected>-- Pilih
                                                            Tim --</option>
                                                        @foreach ($tim_2 as $key => $tim_2)
                                                            <option value="{{ $tim_2->id }}">
                                                                {{ $tim_2->nama_tim }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_tim_3" class="form-control-label">Tim
                                                        3</label>
                                                    <select name="nama_tim_3" class="custom-select custom-select-lg mb-3"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }}
                                                        required>
                                                        <option hidden disabled selected>-- Pilih
                                                            Tim --</option>
                                                        @foreach ($tim_3 as $key => $tim_3)
                                                            <option value="{{ $tim_3->id }}">
                                                                {{ $tim_3->nama_tim }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Unggah
                                                        Bukti
                                                        Pembayaran (Format
                                                        jpg, jpeg)</label>
                                                    <input name="file_bukti" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran"
                                                        {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }}
                                                        required>
                                                </div>

                                                <button type="submit" value="pembayaran" class="btn text-lighter"
                                                    style="width: 100%; background-color: #264579;"
                                                    {{ $electra['pembayaran_status'] == 0 ? '' : 'disabled' }}>Submit</button>
                                                <hr class="my-4" />

                                            </form>

                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
