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
                                        <h1 style="color: white;">Tahap 2
                                            Praktikum</h1>
                                        <div class="bungkus p-4">
                                            <p style="text-align: justify;">
                                                1. Praktikum terdiri dari mata pelajaran rangkaian listrik dasar dan dasar pemrograman yang dilaksanakan secara bergantian. <br>
                                                2. Praktikum disimulasikan oleh panitia kemudian peserta diberikan waktu menjawab pertanyaan selama 10 menit per mata pelajaran. <br>
                                                3. Peserta menuliskan jawaban yang berkenaan dengan analisis praktikum di web.<br>
                                                4. Dalam satu mata pelajaran terdapat dua kolom jawaban masing-masing untuk soal nomor 1 dan nomor 2.<br>
                                                5. Peserta harus mengklik tombol simpan pada masing-masing nomor dan lanjut sesi berikutnya jawaban untuk memunculkan LJK mata pelajaran selanjutnya (Dasar Pemrograman).<br>
                                                6. Pengisian jawaban dengan mengetikkan pada kolom jawaban dengan berupa narasi atau analisis hasil praktikum sesuai dengan permintaan soal dan tingkat pemahaman peserta.<br>
                                                7. Nilai maksimal praktikum sebesar 200 point dengan skor masing-masing mata pelajaran praktikum 100 point.<br>
                                                8. Tidak ada pengurangan nilai apabila peserta tidak mengerjakan dan salah dalam menjawab pertanyaan.<br>
                                                9. Skor pada babak simulasi praktikum tidak jadikan acuan untuk kredit skor rally namun akan diakumulasikan untuk pertimbangan lolos ke babak final sebagai nilai akhir babak semi final.<br>
                                                10. Peserta dapat mengunggah program untuk praktikum Dasar Pemrograman bila terjadi kesalahan pada website Hackerrank. <br>
                                                11. Jawaban Dasar Pemrograman diunggah dalam bentuk ekstensi file <strong>".pdf"</strong><br>

                                            </p>
                                        </div>
                                        <br>
                                        <a href="{{ route('user.siapkanPraktikum') }}">
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