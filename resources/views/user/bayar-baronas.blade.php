@extends('user/template/user-template')

@section('title', 'Pembayaran Baronas | Evolution 2023')

@section('container')

    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pembayaran Baronas</a></li>
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
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                                                    <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                                                                    LOGO ELECTRA
                                                                </h5> -->

                        <div class="row">
                            <div class="col">
                                @if ($baronas['email'] == null)
                                    <div class="alert alert-warning alert-block">
                                        <strong>Anda belum mendaftar lomba apapun, silahkan mengisi formulir pendaftaran
                                            terlebih dahulu</strong>
                                    </div>
                                @endif

                                @if ($baronas['email'] != null && $baronas['pembayaran_status'] == 0)
                                    <div class="alert alert-default" role="alert">
                                        Silahkan lakukan pembayaran sebesar <strong>Rp {{ $harga }}</strong> ke salah
                                        satu rekening tercantum
                                        <br><br>
                                        <strong>Bank BNI</strong>
                                        <br>
                                        0247603554
                                        <br>
                                        a.n. CANYA FREYA LARASATI BUDIYONO
                                        <br><br>
                                        <strong>OVO (Jika menggunakan Ovo maka perlu membayar sebesar Rp.
                                            {{ $harga + 1000 }}</strong>
                                        <br>
                                        08994859729
                                        <br>
                                        a.n Canya Freya
                                        <br><br>
                                        <strong>Gopay</strong>
                                        <br>
                                        08994859729
                                        <br>
                                        a.n Canya Freya
                                        <br><br>
                                        <strong>CP: </strong> +62 899-4859-729 (Canya)
                                    </div>
                                    <div class="card">
                                        <div class="card-body">

                                            <h6 class="heading text-muted mb-4">Konfirmasi Pembayaran</h6>
                                            <form action="{{ route('user.bayarBaronas') }}" enctype="multipart/form-data"
                                                method="POST" id="pilihan-pembayaran">
                                                @csrf


                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Bank Tujuan</label>
                                                    <select name="bank_tujuan" class="custom-select custom-select-lg mb-3">
                                                        <option hidden disabled selected>-- Pilih Bank --</option>
                                                        <option value="Bank BNI">Bank BNI</option>
                                                        <option value="OVO">OVO</option>
                                                        <option value="GOPAY">GOPAY</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-school">Nama
                                                        Pengirim</label>
                                                    <input name="nama_pengirim" type="text" id="bank-account-number"
                                                        class="form-control" placeholder="Nama Pengirim">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Unggah Bukti Pembayaran (Format
                                                        jpg, jpeg)</label>
                                                    <input name="file_bukti" accept="image/jpeg" type="file"
                                                        class="form-control-file" id="bukti-pendaftaran">
                                                </div>

                                                <button type="submit" value="pembayaran" class="btn text-lighter"
                                                    style="width: 100%; background-color: #264579;">Submit</button>
                                                <hr class="my-4" />
                                            </form>

                                        </div>
                                    </div>
                                @endif

                                @if ($baronas['pembayaran_status'] == 1 && $baronas['email'] != null)
                                    <div class="alert alert-warning alert-block">
                                        Pembayaran sedang kami proses, maksimal dalam 2x24 jam
                                    </div>
                                @endif

                                @if (($baronas['pembayaran_status'] == 2 || $baronas['pembayaran_status'] == 4) && $baronas['email'] != null)
                                    <div class="alert alert-success alert-block">
                                        Pembayaran Anda telah berhasil kami terima, silahkan cetak kartu peserta.
                                    </div>
                                @endif

                                @if ($baronas['pembayaran_status'] == 3 && $baronas['email'] != null)
                                    <div class="alert alert-warning alert-block">
                                        Verifikasi sedang kami proses
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
