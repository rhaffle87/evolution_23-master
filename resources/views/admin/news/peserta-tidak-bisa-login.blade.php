@extends('admin/template/admin-template')

@section('title', 'Admin Panels | Evolution ITS')

@section('container')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
        style="min-height: 500px; background-image: url(/assets/img/bg-img/contact-bg.png); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-7"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col col-md-10">
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">PESERTA TIDAK BISA LOGIN/REGIST</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h1 class="mb-0">Yang Harus Dilakukan</h1>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <div class="media-body p-4">
                                <span class="name mb-0 text-sm" style="text-align: justify;">

                                    1. Jika user melakukan registrasi tetapi ada pesan "akun sudah terdaftar atau pass
                                    kurang dari 8" berarti bisa saja akun sudah terdaftar<br>
                                    2. Jika sudah terdaftar tapi tidak bisa login, admin harap melihat ke link
                                    https://evolution-ee-its.com/admin/lihat-semua-data-akun<br>
                                    3. Jika masih tidak bisa, minta peserta untuk ganti password dengan link
                                    https://evolution-ee-its.com/forget-password<br>
                                    4. Nanti peserta akan mendapatkan email
                                    <br>
                                    5. Minta peserta untuk tidak lupa<strong> MENCATAT </strong> akunnya.<br>
                                    6. Pastikan data peserta yang didaftarkan <strong>JANGAN SAMPAI SALAH </strong> <br>
                                    7. Setelah memasukan data peserta, klik Daftar <br>
                                    8. Data peserta yang berhasil terdaftarkan, akan dikonfirmasi langsung pada laman
                                    tersebut <br>
                                    9. Setelah selesai mendaftarkan peserta, cek Daftar Peserta pada menu pojok kiri atas
                                    untuk memastikan data peserta benar-benar terdaftarkan <br>
                                </span>
                            </div>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endsection
