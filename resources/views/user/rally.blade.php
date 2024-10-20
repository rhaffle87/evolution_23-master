@extends('/user/template/user-template-semifinal')

@section('title', 'Semifinal Tahap 3 | Evolution 2021')

@section('container')

<!-- Header -->
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">

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
                <!-- <img src="/img/brand/TEXT_ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1>Tes Rally</h1>
                                    <i>Perhatikan soal yang ditampilkan di zoom</i>
                                    <br> <br>

                                    <div class="alert alert-primary alert-block" style="text-align: center;">
                                        <strong style="text-transform: uppercase">ANDA SEKARANG BERADA PADA SESI {{$peserta->sesi_rally == null ? '1' : $peserta->sesi_rally}} LEVEL KESUSAHAN {{ $peserta->level_rally }}</strong>
                                        <br>
                                        @if($peserta->level_rally == 'Medium')
                                        <strong>KERJAKAN POS 1 - 5</strong>
                                        @elseif($peserta->level_rally == 'Bonus')
                                        <strong>KERJAKAN POS 1 - 5</strong>
                                        @else
                                        <strong>KERJAKAN POS 6 - 10</strong>
                                        @endif
                                    </div>


                                    <button type="button" class="btn btn-md" data-toggle="modal" data-target="#tambah" style=" background-color: #707CAA; color:white">
                                        Tambah Jawaban
                                    </button>
                                    <br>


                                    <br>
                                    @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $notification }}</strong>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <?php for ($i = 1; $i <= 13; $i++) { ?>
                                            <?php for ($j = 1; $j <= 10; $j++) { ?>
                                                <?php if ($data[$i - 1][$j - 1] != null) { ?>
                                                    <div class="card col-8 col-md-2 bg-success p-3 m-2">
                                                        <h3>Sesi <?= $i ?></h3>
                                                        <h3>Pos <?= $j ?></h3>
                                                        <h3>Jawaban Anda : <?= $data[$i - 1][$j - 1] ?></h3>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <br>

                                    <!-- button selesai atau lanjut -->
                                    <!-- and (($peserta->sesi_rally != 8 and $peserta->status_hard == 1 ) or ($peserta->sesi_rally != 5 and $peserta->status_medium_bonus == 0)) -->
                                    @if($peserta->sesi_rally < 13 and !($peserta->sesi_rally == 5 or $peserta->sesi_rally == 8))
                                        <button type="button" class="btn btn-md" style=" background-color: #707CAA; color:white" data-toggle="modal" data-target="#lanjut">
                                            Simpan dan Lanjut Sesi {{$peserta->sesi_rally == null ? '2' : $peserta->sesi_rally+1}}
                                        </button>
                                        <br>
                                        <i>Klik tombol di atas untuk melanjutkan ke sesi berikutnya</i>
                                        @endif


                                        @if(($peserta->sesi_rally == 13 and $peserta->status_medium == 1) or ($peserta->sesi_rally == 8 and $peserta->status_hard == 1))
                                        <div class="row">
                                            <div class="col">
                                                <button data-toggle="modal" type="button" data-target="#konfirmasi" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                    Selesai
                                                </button>
                                                <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                            </div>
                                        </div>

                                        @elseif($peserta->sesi_rally == 13 and $peserta->status_medium == 0)
                                        <div class="row">
                                            <div class="col">
                                                <button data-toggle="modal" type="button" data-target="#konfirmasimedium" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                    Kerjakan Sesi 1 - 5 (Sesi Medium)
                                                </button>
                                                <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                            </div>
                                        </div>

                                        @elseif($peserta->sesi_rally == 5 and $peserta->status_medium_bonus == 0)
                                        <div class="row">
                                            <div class="col">
                                                <button data-toggle="modal" type="button" data-target="#konfirmasimediumbonus" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                    Kerjakan Sesi 6 - 8 (Soal Bonus)
                                                </button>
                                                <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                            </div>
                                        </div>

                                        @elseif($peserta->sesi_rally == 8 and $peserta->status_hard == 0)
                                        <div class="row">
                                            <div class="col">
                                                <button data-toggle="modal" type="button" data-target="#konfirmasihard" class="btn btn-md" style="color: white ;width: 100%; background-color: #707CAA; text-align: center">
                                                    Kerjakan Sesi 9 - 13 (Sesi Hard)
                                                </button>
                                                <i>Klik tombol selesai jika semua sesi telah berakhir</i>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <!-- Jika Selesai Semua -->
                                        @if(($peserta->sesi_rally == 13 and $peserta->status_medium == 1) or ($peserta->sesi_rally == 8 and $peserta->status_hard == 1))
                                        <form method="get" enctype="multipart/form-data" action="{{ route('user.hitungNilai') }}">
                                            <!-- Modal -->
                                            <div class=" modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Apakah Anda Yakin Mengakhiri Sesi Rally ?</h3>
                                                        </div>
                                                        <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                                                        <div class="modal-footer">
                                                            <button type="submit" value="daftar" class="btn btn-md" style="color: white ; background-color: #707CAA; text-align: center">
                                                                Selesai
                                                            </button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <!-- Selesai Hard tapi belum medium -->
                                        @elseif($peserta->sesi_rally == 13 and $peserta->status_medium == 0)
                                        <form method="get" enctype="multipart/form-data" action="{{ route('user.SesiMedium') }}">
                                            <!-- Modal -->
                                            <div class=" modal fade" id="konfirmasimedium" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Kerjakan Level Medium</h3>
                                                        </div>
                                                        <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                                                        <div class="modal-footer">
                                                            <button type="submit" value="daftar" class="btn btn-md" style="color: white ; background-color: #707CAA; text-align: center">
                                                                Go!
                                                            </button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <!-- Selesai Medium belum hard -->
                                        @elseif($peserta->sesi_rally == 8 and $peserta->status_hard == 0)
                                        <form method="get" enctype="multipart/form-data" action="{{ route('user.SesiHard') }}">
                                            <!-- Modal -->
                                            <div class=" modal fade" id="konfirmasihard" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Kerjakan Level Hard</h3>
                                                        </div>
                                                        <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                                                        <div class="modal-footer">
                                                            <button type="submit" value="daftar" class="btn btn-md" style="color: white ; background-color: #707CAA; text-align: center">
                                                                Go!
                                                            </button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Kerjakan Medium Bonus -->
                                        @elseif($peserta->sesi_rally == 5 and $peserta->status_medium_bonus == 0)
                                        <form method="get" enctype="multipart/form-data" action="{{ route('user.SesiMediumBonus') }}">
                                            <!-- Modal -->
                                            <div class=" modal fade" id="konfirmasimediumbonus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Kerjakan Level Bonus</h3>
                                                        </div>
                                                        <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                                                        <div class="modal-footer">
                                                            <button type="submit" value="daftar" class="btn btn-md" style="color: white ; background-color: #707CAA; text-align: center">
                                                                Go!
                                                            </button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        @endif
                                </div>



                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.submitRally') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="input-name">Pilih Sesi </label>

                            <select name="sesi_ke" id="sesi_ke" class="form-control" required>
                                <option disabled selected value> -- Pilih Sesi-- </option>
                                <!-- Medium -->
                                <option value="sesi_1" {{$peserta->sesi_rally == "1" ? '' : 'disabled'}}>Sesi 1 - Medium</option>
                                <option value="sesi_2" {{$peserta->sesi_rally == "2" ? '' : 'disabled'}}>Sesi 2 - Medium</option>
                                <option value="sesi_3" {{$peserta->sesi_rally == "3" ? '' : 'disabled'}}>Sesi 3 - Medium</option>
                                <option value="sesi_4" {{$peserta->sesi_rally == "4" ? '' : 'disabled'}}>Sesi 4 - Medium</option>
                                <option value="sesi_5" {{$peserta->sesi_rally == "5" ? '' : 'disabled'}}>Sesi 5 - Medium</option>
                                <!-- Bonus Medium -->
                                <option value="sesi_6" {{$peserta->sesi_rally == "6" ? '' : 'disabled'}}>Sesi Bonus 1</option>
                                <option value="sesi_7" {{$peserta->sesi_rally == "7" ? '' : 'disabled'}}>Sesi Bonus 2</option>
                                <option value="sesi_8" {{$peserta->sesi_rally == "8" ? '' : 'disabled'}}>Sesi Bonus 3</option>
                                <!-- Hard -->
                                <option value="sesi_9" {{$peserta->sesi_rally == "9" ? '' : 'disabled'}}>Sesi 9 - Hard</option>
                                <option value="sesi_10" {{$peserta->sesi_rally == "10" ? '' : 'disabled'}}>Sesi 10 - Hard</option>
                                <option value="sesi_11" {{$peserta->sesi_rally == "11" ? '' : 'disabled'}}>Sesi 11 - Hard</option>
                                <option value="sesi_12" {{$peserta->sesi_rally == "12" ? '' : 'disabled'}}>Sesi 12 - Hard</option>
                                <option value="sesi_13" {{$peserta->sesi_rally == "13" ? '' : 'disabled'}}>Sesi 13 - Hard</option>
                            </select>

                        </div>

                        <div class="form-group" 3 <label class="form-control-label" for="input-name">Pilih Pos </label>
                            <select name="pos_ke" id="kelas-ketua" class="form-control" required>
                                <option disabled selected value> -- Pilih Pos-- </option>
                                <!-- {{ $peserta->level_rally=='Medium'? '' : 'disabled' }}  {{ $peserta->level_rally=='Bonus'? '' : 'disabled'}}
                                {{ $peserta->level_rally=='Medium'? '' : 'disabled' }}  {{ $peserta->level_rally=='Bonus'? '' : 'disabled'}}
                                {{ $peserta->level_rally=='Medium'? '' : 'disabled' }}  {{ $peserta->level_rally=='Bonus'? '' : 'disabled'}}
                                {{ $peserta->level_rally=='Medium'? '' : 'disabled' }}  {{ $peserta->level_rally=='Bonus'? '' : 'disabled'}}
                                {{ $peserta->level_rally=='Medium'? '' : 'disabled' }}  {{ $peserta->level_rally=='Bonus'? '' : 'disabled'}} -->
                                <option value="pos_1" {{ $peserta->level_rally!='Hard' ? '' : 'disabled' }}>Pos 1</option>
                                <option value="pos_2" {{ $peserta->level_rally!='Hard' ? '' : 'disabled' }}>Pos 2</option>
                                <option value="pos_3" {{ $peserta->level_rally!='Hard' ? '' : 'disabled' }}>Pos 3</option>
                                <option value="pos_4" {{ $peserta->level_rally!='Hard' ? '' : 'disabled' }}>Pos 4</option>
                                <option value="pos_5" {{ $peserta->level_rally!='Hard' ? '' : 'disabled' }}>Pos 5</option>
                                <option value="pos_6" {{ $peserta->level_rally=='Hard' ? '' : 'disabled' }}>Pos 6</option>
                                <option value="pos_7" {{ $peserta->level_rally=='Hard' ? '' : 'disabled' }}>Pos 7</option>
                                <option value="pos_8" {{ $peserta->level_rally=='Hard' ? '' : 'disabled' }}>Pos 8</option>
                                <option value="pos_9" {{ $peserta->level_rally=='Hard' ? '' : 'disabled' }}>Pos 9</option>
                                <option value="pos_10" {{ $peserta->level_rally=='Hard' ? '' : 'disabled' }}>Pos 10</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-name">Jawaban</label>
                            <input name="jawaban_rally" type="text" id="nama-tim" class="form-control" placeholder="Masukkan Jawaban Anda" value="" required>
                            <i>setelah disimpan, jawaban tidak dapat diubah</i>
                        </div>

                </div>
                <div class="modal-footer">
                    <button id="hapusBtnFinal" href="" type="submit" class="btn btn-primary">Simpan !</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- lanjut sesi  -->
    <div class="modal fade" id="lanjut" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="">Pindah ke sesi berikutnya?</h3>

                </div>
                <form action="{{ route('user.lanjutSesiRally') }}" method="GET">
                    @csrf

                    <div class="modal-footer">
                        <button id="hapusBtnFinal" href="" type="submit" class="btn btn-primary">Lanjut Sesi {{$peserta->sesi_rally == null ? '2' : $peserta->sesi_rally+1}} !</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <style>
        option:disabled {
            color: grey !important;
        }

        option {
            color: black;
        }
    </style>

    @endsection
