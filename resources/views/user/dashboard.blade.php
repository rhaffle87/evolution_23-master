@extends('user/template/user-template')

@section('title', 'Selamat Datang | Evolution 2023')

@section('container')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
        style="min-height: 500px; background-image: url(/assets/img/bg-img/home-header.png); background-size: cover; background-position: center top; background-color: black;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">SELAMAT DATANG <br> PESERTA EVOLUTION 2023
                    </h1>

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
                    <ul class="nav nav-tabs mx-4" id="myTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link" id="electra-tab" data-toggle="tab" href="#electra" role="tab"
                                aria-controls="home" aria-selected="false"><b>Electra</b></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="baronas-tab" data-toggle="tab" href="#baronas" role="tab"
                                aria-controls="profile" aria-selected="true"><b>Baronas</b></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" id="evolve-tab" data-toggle="tab" href="#evolve" role="tab"
                                aria-controls="contact" aria-selected="false"><b>Evolve</b></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        {{-- Evolve tabs --}}
                        <div class="tab-pane fade show active" id="evolve" role="tabpanel" aria-labelledby="baronas-tab">
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <div class="media-body p-4">
                                        <div class="timeline mb-5">
                                            <h3>Guidebook</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                <a href="https://its.id/m/GBEvolve2023" target="_blank">https://its.id/m/GBEvolve2023</a><br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Timeline</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                Pendaftaran Peserta 		:  1 Juni 2023 - 25 Juli 2023 <br>
                                                Deadline upload video 	: 1 Juni - 25 Juli 2023 <br>
                                                Pengumuman top 5 		: 30 Juli 2023 <br>
                                                Technical Meeting Lomba 	: 5 Agustus 2023 <br>
                                                Evolve Day 			: Agustus 2023 <br>
                                            </span>
                                        </div>

                                        <div class="timeline mb-5">
                                            <h3>Biaya Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                HTM : Rp75.000<br>
                                            </span>
                                        </div>

                                        <div class="timeline mb-5">
                                            <h3>Hadiah</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                Juara 1 : Rp2.000.000 + sertifikat/orang <br>
                                                Juara 2 : Rp1.500.000 + sertifikat/orang <br>
                                                Juara 3 : Rp1.000.000 + sertifikat/orang <br>
                                                Juara Favorit : Rp500.000                                                
                                            </span>
                                        </div>

                                        <div class="timeline mb-5">
                                            <h3>Nomor Rekening</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                Mandiri 1400021278305 (ISNUANSA MAHARANI PU)<br>
                                                Dana 081232444947 (ISNUANSA MAHARANI PU)<br>
                                                OVO 081232444947 (ISNUANSA MAHARANI PU)
                                            </span>
                                        </div>

                                        <div class="info-pendaftaran mb-5">
                                            <h3>Informasi Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                 1. Buka website evolution-ee-its.com
                                            <br> 2. Buat akun baru dengan username berupa email dan password kemudian verifikasi
                                            <br> 3. Setelah verifikasi silahkan login kembali pada website evolution-ee-its.com
                                            <br> 4. Pilih Pendaftaran lalu Daftar Evolve pada dashboard
                                            <br> 5. Jika data pendaftaran telah lengkap dan benar, 
                                                    silahkan melakukan pembayaran biaya pendaftaran dan wajib mengupload bukti transfer pembayaran
                                            <br> 6. Pendaftar dimohon menunggu verifikasi pembayaran. 
                                                    Pembayaran akan diverifikasi maksimal 3x24 jam setelah upload bukti pembayaran. 
                                                    Jika lebih dari 3x24 jam pembayaran belum diverifikasi, peserta dapat menghubungi 
                                                    CP yang disediakan.
                                            <br> 7. Setelah pembayaran diverifikasi, maka seluruh proses registrasi selesai. 
                                                    Pendaftar akan menerima email kwitansi pembayaran.
                                            
                                            </span>
                                        </div>

                                        <div class="info-pendaftaran mb-5">
                                            <h3>Informasi Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                 1. Buka website evolution-ee-its.com
                                            <br> 2. Pilih Pendaftaran lalu Upload Video Cover EVOLVE 2023 pada dashboard
                                            <br> 3. Isi data dan cantumkan link video youtube yang sudah di upload
                                            <br> 4. Submit
                                            </span>
                                        </div>

                                        <div class="info-pendaftaran mb-5">
                                            <h3>Syarat dan Ketentuan</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                 1. Satu band hanya terdiri dari maksimal 7 orang dan minimal 5 orang
                                            <br> 2. Peserta yang dapat mengikuti kegiatan EVOLVE adalah pelajar atau mahasiswa
                                                    (SMP, SMA, Perguruan Tinggi) di Surabaya
                                            <br> 3. Band yang sudah mendaftar tidak dapat mengajukan refund, kecuali jika terjadi pembatalan acara, 
                                                    maka biaya pendaftaran akan dikembalikan sesuai dengan ketentuan yang berlaku.
                                            <br> 4. Peserta wajib menunjukkan tiket top 5 dan KTP saat melakukan registrasi band top 5
                                            <br> 5. Dilarang membawa senjata tajam, obat-obatan terlarang, rokok, bahan yang mudah terbakar, 
                                                    dan bahan/alat lainnya yang berpotensi berbahaya selama acara berlangsung.
                                            <br> 6. Panitia memiliki hak untuk mengubah ataupun menambahkan syarat-syarat dan ketentuan tanpa pemberitahuan lebih dahulu
                                            <br> 7. Syarat dan ketentuan dari panitia tidak dapat diganggu gugat
                                            
                                            </span>
                                        </div>

                                        <div class="contact-person mb-5">
                                            <h3>Contact Person</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                <b>Deny Andrean Saputra </b><br>
                                                &emsp; WhatsApp: <a href="https://wa.me/6285850696057" target="blank">+62 858-5069-6057</a><br>
                                                <b>Hafizh Athallah Rinandri  </b><br>
                                                &emsp; WhatsApp: <a href="https://wa.me/6287883855776" target="blank">+62 878-8385-5776</a><br>
                                                    </span>
                                        </div>

                                    </div>
                                </table>
                            </div>
                        </div>



                        <!--ELECTRA Tabs-->

                        <div class="tab-pane fade show" id="electra" role="tabpanel" aria-labelledby="electra-tab">
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <div class="media-body p-4">


                                        <div class="timeline mb-5">
                                            <h3>Time Line</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                - Pendaftaran: 21 November 2023 - 15 Januari 2023<br>
                                                - Try Out: Sabtu, 17 Januari 2023 <br>
                                                - Babak Penyisihan 21 Januari 2023 <br>
                                                - Babak Semifinal 11 Februari 2023 <br>
                                                - Babak Grand Final 12 Februari 2023 <br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Biaya Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                HTM : Rp. 100.000 / Tim<br>
                                                HTM : Rp. 280.000 / 3 Tim <br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Nomor Rekening</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                1400021255121 (Mandiri)<br>
                                                SABRINA QOLBU PRADIP
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Contact Person</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                <b>William </b><br>
                                                &emsp; id Line : william_ritonga07<br>
                                                &emsp; WhatsApp: <a href="https://wa.me/6281376312254" target="blank">Click
                                                    Here</a><br>
                                                <b>Asyrfil </b><br>
                                                &emsp; id Line : kafeinn.<br>
                                                &emsp; WhatsApp: <a href="https://wa.me/6281359523190" target="blank">Click
                                                    Here</a><br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Informasi Poster</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify">
                                                <a
                                                    href="https://docs.google.com/document/d/1VOPK7AfT0fHClCGbSDF54WBfQrzmupbJ/edit">Click
                                                    Here</a>
                                            </span>
                                        </div>
                                        <div class="info-pendaftaran mb-5">
                                            <h3>Informasi Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">Pendaftaran Online
                                                <br>
                                                1. Buka website evolution-ee-its.com <br>
                                                2. Buat akun baru dengan username berupa email dan password kemudian
                                                verifikasi <br>
                                                3. Setelah verifikasi silahkan login kembali pada website
                                                evolution-ee-its.com
                                                <br>
                                                4. Pilih menu “Pendaftaran” dan isi kelengkapan data tim, pastikan memilih
                                                “electra” pada saat mengisi kelengkapan pendaftaran <br>
                                                5. Jika data pendaftaran telah lengkap dan benar, silahkan melakukan
                                                pembayaran biaya pendaftaran pada no. rekening atau no. OVO yang disediakan
                                                dan wajib mengupload bukti transfer pembayaran pada menu “ Pembayaran “ <br>
                                                6. Pendaftar dimohon menunggu verifikasi pembayaran. Pembayaran akan
                                                diverifikasi maksimal H+2 setelah upload bukti pembayaran. <br>
                                                7. Setelah pembayaran diverifikasi, maka seluruh proses registrasi selesai.
                                                Pendaftar akan menerima email kwitansi pembayaran.
                                                Jika lebih dari H+2 pembayaran belum diverifikasi dapat menghubungi CP
                                                Electra 12. <br>
                                                <br>
                                                9. Jika lebih dari H+2 pembayaran belum diverifikasi dapat menghubungi CP
                                                Electra 12 <br>
                                                <br>Pendaftaran Offline <br>
                                                1. Pendaftar menghubungi Korlap Region masing-masing pada CP yang telah
                                                tersedia di Guidebook ELECTRA 11 <br>
                                                2. Pendaftar mengisi form pendaftaran yang telah disediakan Korlap Region
                                                dan melunasi biaya pendaftaran. <br>
                                                3. Setelah pendaftar melunasi biaya pendaftaran maka akan mendapatkan
                                                checklist berisi username ( email peserta ) dan password untuk digunakan
                                                login ke website evolution-its.com <br>
                                                4. Pendaftar melakukan login ke web evolution-its.com untuk validasi
                                                kelengkapan data tim dan mengunduh kartu tanda peserta pada menu “ Cetak
                                                Kartu Peserta “. <br>
                                                5. Kartu peserta wajib diunduh dan digunakan saat Penyisihan ELECTRA 11.
                                                <br>
                                                6. Jika lebih dari H+2 pendaftaran ke Korlap Region dan belum terdapat menu
                                                cetak kartu peserta maka dapat menghubungi CP Electra 12 <br>
                                        </div>
                                        </span>
                                    </div>
                                </table>
                            </div>
                        </div>


                        <!-- Baronas Tabs -->
                        <div class="tab-pane fade show" id="baronas" role="tabpanel" aria-labelledby="baronas-tab">
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table align-items-center ">
                                    <div class="media-body p-4">


                                        <div class="timeline mb-5">
                                            <h3>Timeline Baronas</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">

                                                <b>Timeline Paper :</br></b>
                                                Pengumpulan abstrak : 26 Nov 2023 - 12 Januari 2023</br>
                                                Extend : 12 Jan 2023 - 19 Januari 2023</br>
                                                Pengumuman Lolos Abstrak dan Post Guidebook Baru : 21 Jan 2023</br>
                                                Pengumpulan Full Paper dan Video : 22 Jan 2023 - 24 Feb 2023</br>
                                                Pemngumuman Lolos Full Paper dan Video : 28 Feb 2023</br>
                                                TM Paper : 4 Mar 2023</br>
                                                Presentasi Finalis Paper : 18 Mar 2023</br></br>


                                                <b>Timeline Kategori SD, SMP, SMA</b></br>
                                                Open Registrasi Peserta Gelombang 1 : 26 Desember - 9 Jan 2023</br>
                                                Open Registrasi Peserta Gelombang 2 : 11 Januari - 20 Januari 2023</br>
                                                Extend : 20 Januari - 27 Januari 2023</br>
                                                Pengumpulan Video : 27 Januari - 22 Februari 2023</br>
                                                Pengumuman Lolos Video : 28 Februari 2023</br>
                                                Technical Meeting : 4 Maret 2023</br>
                                                Visitasi : 05 Maret 2023</br>
                                                Babak Kualifikasi - 16 Besar : 10 Maret – 11 Maret 2023</br>
                                                Babak 8 Besar – Final : 18 Maret</br></br>

                                                <b>Timeline Kategori UMUM (SUMO)</b></br>
                                                Open Registrasi Peserta Gelombang 1 : 26 Desember - 9 Jan 2023</br>
                                                Open Registrasi Peserta Gelombang 2 : 11 Januari - 20 Januari 2023</br>
                                                Extend : 20 Januari - 27 Januari 2023</br>
                                                Pengumpulan Video : 27 Januari - 22 Februari 2023</br>
                                                Pengumuman Lolos Video : 28 Februari 2023</br>
                                                Technical Meeting : 4 Maret 2023</br>
                                                Visitasi : 05 Maret 2023</br>
                                                Babak Kualifikasi - Final : 18 Maret</br></br>

                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Biaya Pendaftaran</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                SD Gel 1 : 100.000<br>
                                                SD Gel 2 : 150.000<br><br>

                                                SMP Gel 1 : 125.000<br>
                                                SMP Gel 2 : 175.000<br><br>

                                                SMA Gel 1 : 150.000<br>
                                                SMA Gel 2 : 200.000<br><br>

                                                Umum Gel 1 : 250.000<br>
                                                Umum Gel 2 : 275.000<br><br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Nomor Rekening</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                BNI 0247603554 (CANYA FREYA LARASATI BUDIYONO)<br>
                                                OVO 08994859729 (Canya Freya)<br>
                                                Gopay 08994859729 (Canya Freya)<br><br>
                                            </span>
                                        </div>
                                        <div class="timeline mb-5">
                                            <h3>Contact Person</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                &emsp;WA BARONAS : 081234858488<br>
                                            </span>
                                        </div>

                                        <div class="timeline mb-5">
                                            <h3>Link Group Whatsapp Baronas Paper Competition 2023</h3>
                                            <span class="name mb-0 text-sm" style="text-align: justify;">
                                                &emsp;<a href="https://intip.in/WAGPaper2023">Klik disini</a><br>
                                            </span>
                                        </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
