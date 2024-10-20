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
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">SELAMAT DATANG ADMIN</h1>

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
                        <h1 class="mb-0">PENGUMUMAN</h1>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <div class="media-body p-4">
                                <h3>STEP MENDAFTARKAN PESERTA BAGI KORLAP REGION</h3>
                                <span class="name mb-0 text-sm" style="text-align: justify;">

                                    1. Masuk ke web https://evolution-ee-its.com/ <br>
                                    2. Login menggunakan akun admin <br>
                                    email: websiteeeevolits@gmail.com <br>
                                    pass: Evolits23 <br>
                                    3. Pada menu pojok kiri atas, klik Daftarkan Peserta, kemudian pilih bagian Electra <br>
                                    4. Masukan data peserta dari spreadsheet yang sudah <strong>LUNAS </strong> dan memenuhi
                                    syarat <br>
                                    5. Untuk Nama Tim, Nama Ketua, dan Nama Anggota dituliskan <strong> CAPSLOCK </strong>.
                                    Selain itu, dibebaskan <br>
                                    6. Pastikan data peserta yang didaftarkan <strong>JANGAN SAMPAI SALAH </strong> <br>
                                    7. Setelah memasukan data peserta, klik Daftar <br>
                                    8. Data peserta yang berhasil terdaftarkan, akan dikonfirmasi langsung pada laman
                                    tersebut <br>
                                    9. Setelah selesai mendaftarkan peserta, cek Daftar Peserta pada menu pojok kiri atas
                                    untuk memastikan data peserta benar-benar terdaftarkan <br>
                                    10. Jika dirasa data peserta yang didaftarkan salah, <strong> hubungi KESTARI
                                    </strong><br>
                                    11. Kesalahan input data peserta dari Korlap pada menu Daftar Peserta dapat menyebabkan
                                    perbedaan data aktual jumlah peserta dengan nomer peserta, maka dari itu pastikan data
                                    peserta yang terdaftar adalah <strong> BENAR </strong> meminimalisir perbedaan jumlah
                                    peserta terdaftar dengan nomor peserta<br>
                                    12. Bagian Verifikasi hanya digunakan/diklik oleh <strong> PIHAK STAFF KESTARI </strong>
                                    <br>
                                    13. <strong> Korlap DILARANG menggunakan/mengklik Verifikasi </strong>

                                </span>
                            </div>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endsection
