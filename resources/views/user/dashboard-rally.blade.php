@extends('/user/template/user-template-semifinal')

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
                                        <!-- 60.000 + 100 + 2 least unique ID -->
                                        <h1 style="color: white;">Tahap 3
                                            Rally</h1>
                                        <div class="bungkus p-4">
                                            <p style="text-align: justify;">
                                            1. Pada babak rally terdiri dari 10 breakoutroom yang terdiri dari masing-masing 2 pos soal Matematika, Fisika, Logika, Rangkaian Listrik Dasar, dan Dasar Pemrograman. <br>
                                                2. Pada setiap breakoutroom terdapat 13 soal yang akan ditayangkan secara bergantian dalam 13 sesi dengan soal sesi 1-5 level normal, sesi 6-8 level bonus dan sesi 6-10 level hard.<br>
                                                3. Untuk Level Normal dan Bonus, peserta <strong>HANYA</strong> dapat mengerjakan pos 1-5. <br>
                                                4. Untuk Level Hard, peserta <strong>HANYA</strong> dapat mengerjakan pos 6-10. <br>
                                                5. Antar pos yang satu dengan pos yang lain, soal akan ditayangkan secara bersamaan sesuai dengan urutan sesinya.<br>
                                                6. <strong>WAKTU PENGERJAAN</strong> soal level normal dan level bonus adalah 5 menit dan soal hard 8 menit.<br>
                                                <!-- 5. Soal akan mulai ditayangkan mulai pukul 13.00 WIB dan pemberitahuan waktu pengerjaan akan disampaikan penjaga pos di setiap menitnya <br> -->
                                                7. Jawaban berbentuk isian singkat bukan esay.<br>
                                                8. Apabila peserta telah selesai menjawab soal sebelum waktu yang telah ditentukan peserta bisa berpindah pos untuk menjawab soal yang lain.<br>
                                                9. Peserta mengetikkan jawaban pada web yang disediakan sesuai dengan sesi dan posnya. <strong>UNTUK LEBOH DETAILNYA SILAHKAN BACA PETUNJUK TEKNIS MENJAWAB SOAL BABAK RALLY PADA GUIDE BOOK SEMI FINAL</strong>.<br>
                                                10. Petunjuk pengisian jawaban.<br>
                                                - Jawaban berupa satu digit bilangan bulat, apabila ribuan ditulis tanpa menggunakan titik, contoh: <strong> 25, -345, 1945, 10000 </strong>.<br>
                                                - Apabila jawaban berupa angka <strong> TIDAK BULAT </strong>dibulatkan hingga dua angka di belakang koma, kecuali ada ketentuan tertentu dari soal. Tanda yang digunakan menggunakan <strong> TITIK (.), contoh: 18.358 menjadi 18.36, 17.555 menjadi 17.56, 12.333 menjadi 12.33, dan 45.3 menjadi 45.30.</strong><br>
                                                - Jika jawaban lebih dari satu, jawab dengan format <strong>“jawaban1 jawaban2 jawaban3 ...”</strong> Contoh: jika jawabannya 31, 10, dan 150, maka jawabannya diketik 10 31 150.<br>
                                                - Jawaban ditulis tanpa menggunakan satuan kecuali ada petunjuk khusus menjawab dari soal.<br>
                                                - Apabila jawaban soal dalam bentuk kata-kata, ikuti petunjuk khusus dalam menjawab pada soal.<br>
                                                - Jika jawaban berupa kata, jawaban ditulis dengan huruf kecil semua <strong>KECUALI</strong> ada ketentuan khusus dari soal tersebut.<br>
                                                11. <strong> HARGA BELI</strong> untuk soal normal adalah 20 kredit dan soal hard 40 kredit.<br>
                                                12. Apabila <strong>PESERTA MENJAWAB BENAR</strong> untuk soal normal akan mendapatkan tambahan kredit skor sebesar 50 kredit dan hard 100 kredit.<br>
                                                13. Jawaban salah tidak mendapatkan skor juga tidak mendapatkan pengurangan kredit skor.<br>
                                                14. Peserta <strong>WAJIB</strong> membeli soal dengan ketentuan:<br>
                                                - 2 soal matematika<br>
                                                - 1 soal fisika<br>
                                                - 1 soal logika<br>
                                                - 3 soal rangkaian listrik dasar<br>
                                                - 3 soal dasar pemrograman<br>
                                                - Note: <strong>LEVEL BONUS TIDAK DIHITUNG, SERTA TIDAK DIKENAI PEMBELIAN SOAL</strong> <br>
                                                15. Apabila peserta tidak memenuhi kriteria pos wajib maka akan mendapatkan pengurangan kredit skor sebesar 25 kredit per satu soal di setiap mapel.<br>
                                                16. Peserta dianggap membeli soal apabila telah mengunggah jawaban sesuai dengan batas waktu yang telah ditentukan.<br>
                                                17. Peserta yang masuk ke suatu pos tetapi tidak menjawab atau tidak mengunggah jawaban sesuai batas waktu maksimal yang telah ditentukan maka dianggap tidak menjawab dan tidak membeli soal di pos tersebut.<br>
                                                18. Setiap tim bebas mengatur strategi urutan pos mata pelajaran yang akan dikerjakan.<br>
                                                19. Total akhir kredit skor yang diperoleh peserta akan dijadikan pertimbangan peserta lolos ke babak final.<br>
                                            </p>
                                        </div>
                                        <br>
                                        <a href="{{ route('user.siapkanRally') }}">
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