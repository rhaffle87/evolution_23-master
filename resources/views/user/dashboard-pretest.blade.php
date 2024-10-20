@extends('user/template/user-template-semifinal')

@section('title', 'Selamat Datang | Evolution 2021')

@section('container')

<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(/img/theme/hero.jpeg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-10">
                <h1 class="display-2 text-white mb-5" style="font-size: 50px; text-align: center">SELAMAT DATANG DI SEMIFINAL ELECTRA 2021</h1>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Tab Electra  -->
                <div class="tab-pane active" id="tabElectra" role="tabpanel">
                    <div class="card pengumuman">

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <div class="media-body p-4">


                                    <div class="alert alert-default" role="alert" style="text-align: center">
                                        <h1 style="color: white;">Tahap 1
                                            PreTest</h1>
                                        <div class="bungkus p-4">
                                            <p style="text-align: justify;">
                                                1. Jumlah soal di dalam pretest terdiri dari 20 butir soal dengan 10 level medium dan 10 level hard yang terdiri dari mata pelajaran matematika, fisika, logika, rangkaian listrik dasar dan dasar pemrograman. <br>
                                                2. Soal ditayangkan dalam bentuk power point secara acak dimana dalam satu slide terdapat satu soal level medium dan satu soal level hard dengan waktu pengerjaan 10 menit. <br>
                                                3. Peserta mengetikkan jawaban pada website sesuai dengan soal yang ditayangkan. <br>
                                                4. LJK pada web satu per satu sesuai dengan soal yang ditayangkan pada power point. Peserta harus mengklik tombol SIMPAN untuk memunculkan LJK nomor berikutnya. <br>
                                                5. Jawaban yang sudah disimpan <strong>TIDAK DAPAT DIUBAH KEMBALI. </strong> <br>
                                                6. Untuk mengakhiri babak pretest dan sebagai syarat masuk babak praktikum, peserta wajib meng-klik tombol <strong>SELESAI</strong>.<br>
                                                7. Petunjuk pengisian jawaban yang diperbolehkan.<br>
                                                - Jawaban berupa satu digit bilangan bulat, apabila ribuan ditulis tanpa menggunakan titik, contoh: <strong> 25, -345, 1945, 10000. </strong><br>
                                                -  Apabila jawaban berupa angka <strong>TIDAK BULAT</strong>, maka bulatkan jawaban hingga dua angka dibelakang koma kecuali ada ketentuan dari soal. Tanda yang digunakan menggunakan <strong>ITIK (.)</strong>, contoh: 3.54 , -1945.75 <br>
                                                - Untuk pembulatannya, nilai <strong style="text-transform: uppercase">di atas dan sama dengan 0.005 dibulatkan menjadi 0.01</strong> Contoh: 18.358 menjadi 18.36, 17.555 menjadi 17.56, 12.333 menjadi 12.33, dan 45.3 menjadi 45.30.<br>
                                                - Jika jawaban lebih dari satu, jawab dengan format <strong>“jawaban1 jawaban2 jawaban3 ...”</strong> Contoh: jika jawabannya 31, 10, dan 150, maka jawabannya diketik 10 31 150.<br>
                                                - Jika jawaban berupa kata, jawaban ditulis dengan huruf kecil semua <strong>KECUALI</strong> ada ketentuan khusus dari soal tersebut.<br>
                                                - Jawaban ditulis tanpa menggunakan satuan <strong>KECUALI</strong> ada petunjuk khusus menjawab dari soal.<br>
                                                - Apabila jawaban soal dalam bentuk kata-kata, ikuti petunjuk khusus dalam menjawab pada soal.<br>
                                                8. Peserta yang <strong> MENJAWAB BENAR </strong> pada soal medium akan mendapatkan 25 kredit skor dan soal hard 40 kredit skor.<br>
                                                9. Peserta yang <strong> TIDAK MENJAWAB </strong> atau <strong> JAWABAN SALAH </strong> tidak mendapat pengurangan nilai.<br>
                                                10. Setiap tim akan mendapatkan modal 300 kredit skor awal.<br>
                                                11. Kredit skor awal dengan perolehan kredit skor pretest akan dijumlahkan dan digunakan sebagai modal untuk membeli soal pada babak rally.<br>
                                            </p>
                                        </div>

                                        <br>
                                        <a href="{{ route('user.siapkanPretest') }}">
                                            <button type="submit" value="daftar" class="btn btn-md col-5 col-lg-2 mt--3" style="color: white; background-color: #707CAA">
                                                Mulai
                                            </button>
                                        </a>
                                    </div>

                                </div>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection