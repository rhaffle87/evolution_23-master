@extends('admin/template/admin-template')

@section('title', 'List Electra Admin | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"
                                            style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Daftar Peserta
                                        Electra</a></li>
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
                    <!-- <img src="/img/brand/ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: xx-large; text-align: left;">
                            <!-- <img src="/img/brand/TEXT_ELECTRA.png" alt=""> -->
                            <a href="{{ url('/admin/excel/electra') }}" class="">
                                <button class="btn btn-md bg-success" style="color: white;">Export <i
                                        class="fas fa-file-excel ml-2"></i></button>
                            </a>
                        </h5>

                        <h5 class="card-title" style="font-size: xx-large; text-align: left;">
                            <!-- <img src="/img/brand/TEXT_ELECTRA.png" alt=""> -->
                            <a href="{{ url('/admin/semifinal/transimgrasi') }}" class="">
                                <button class="btn btn-md bg-success" style="color: white;">List peserta lolos</button>
                            </a>
                        </h5>

                        <div class="row">
                            <div class="col">
                                @if ($notification = Session::get('email-fail'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $notification }}</strong>
                                    </div>
                                @endif

                                @if ($notification = Session::get('email-success'))
                                    <div class="alert alert-success alert-block">
                                        <strong>{{ $notification }}</strong>
                                    </div>
                                @endif

                                @if ($notification = Session::get('success'))
                                    <div class="alert alert-danger alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('success-update'))
                                    <div class="alert alert-success alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('sukses'))
                                    <div class="alert alert-success alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif


                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No Peserta</th>
                                                        <th>Tim </th>
                                                        <th>Ketua</th>
                                                        <th>Region</th>
                                                        <th>Pembayaran</th>
                                                        <th>Tanggal Daftar</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_electra as $electra)
                                                        <?php $e = 1; ?>
                                                        <!-- region  -->
                                                        @if ($electra->region == null)
                                                            <?php $x = 0;
                                                            $y = 0;
                                                            $e = 2; ?>
                                                        @endif

                                                        @if ($electra->region == 'Jabodetabek')
                                                            <?php $x = 1;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($electra->region == 'Banyuwangi')
                                                            <?php $x = 1;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($electra->region == 'Madiun')
                                                            <?php $x = 0;
                                                            $y = 9; ?>
                                                        @endif

                                                        @if ($electra->region == 'Tuban')
                                                            <?php $x = 0;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($electra->region == 'Semarang')
                                                            <?php $x = 1;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($electra->region == 'Malang')
                                                            <?php $x = 0;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($electra->region == 'Surabaya')
                                                            <?php $x = 0;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($electra->region == 'Sidoarjo')
                                                            <?php $x = 0;
                                                            $y = 2; ?>
                                                        @endif

                                                        @if ($electra->region == 'Bali')
                                                            <?php $x = 1;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($electra->region == 'Gresik')
                                                            <?php $x = 0;
                                                            $y = 3; ?>
                                                        @endif

                                                        @if ($electra->region == 'Balikpapan')
                                                            <?php $x = 1;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($electra->region == 'Jember')
                                                            <?php $x = 1;
                                                            $y = 0; ?>
                                                        @endif

                                                        @if ($electra->region == 'Kediri')
                                                            <?php $x = 0;
                                                            $y = 8; ?>
                                                        @endif

                                                        @if ($electra->region == 'Mojokerto')
                                                            <?php $x = 0;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($electra->region == 'Madura')
                                                            <?php $x = 1;
                                                            $y = 2; ?>
                                                        @endif

                                                        @if ($electra->region == 'Probolinggo')
                                                            <?php $x = 0;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($electra->region == 'Solo')
                                                            <?php $x = 1;
                                                            $y = 3; ?>
                                                        @endif

                                                        <!-- id  -->
                                                        @if ($electra->id / 10 < 1)
                                                            <?php $a = 0;
                                                            $b = 0;
                                                            $c = 0;
                                                            $d = substr($electra->id, 0, 1); ?>
                                                            @endif @if ($electra->id / 10 < 10 && $electra->id / 10 >= 1)
                                                                <?php $a = 0;
                                                                $b = 0;
                                                                $c = substr($electra->id, 0, 1);
                                                                $d = substr($electra->id, 1, 1); ?>
                                                            @endif

                                                            @if ($electra->id / 10 > 10 && $electra->id / 10 < 100)
                                                                <?php $a = 0;
                                                                $b = substr($electra->id, 0, 1);
                                                                $c = substr($electra->id, 1, 1);
                                                                $d = substr($electra->id, 2, 1); ?>
                                                                @endif @if ($electra->id / 10 > 100)
                                                                    <?php $a = substr($electra->id, 0, 1);
                                                                    $b = substr($electra->id, 1, 1);
                                                                    $c = substr($electra->id, 2, 1);
                                                                    $d = substr($electra->id, 3, 1); ?>
                                                                @endif







                                                                <tr>
                                                                    <td><?= $x . $y . '-' . '20' . $a . '-' . $b . $c . $d . '-' . $e ?>
                                                                    </td>
                                                                    <td>{{ $electra->nama_tim }}</td>
                                                                    <td>{{ $electra->nama_ketua }}</td>
                                                                    <td>
                                                                        @if ($electra->region == '')
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-success">Online</span>
                                                                        @endif

                                                                        @if ($electra->region != '')
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-primary">{{ $electra->region }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>

                                                                        @if ($electra->pembayaran_status == 0)
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-secondary">Menunggu
                                                                                pembayaran</span>
                                                                        @endif

                                                                        @if ($electra->pembayaran_status == 1)
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-warning">Belum
                                                                                dikonfirmasi</span>
                                                                        @endif

                                                                        @if ($electra->pembayaran_status == 2)
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-success">LUNAS</span>
                                                                        @endif

                                                                        @if ($electra->pembayaran_status == 3 || $electra->pembayaran_status == 4)
                                                                            <span
                                                                                class="badge badge-pill badge-lg badge-primary">LANGSUNG</span>
                                                                        @endif

                                                                    </td>
                                                                    <td>{{ $electra->created_at }}</td>
                                                                    <td style="text-align: center">
                                                                        <!-- <a href="{{ url('/admin/list/electra/konfirmasi') }}/{{ $electra->id }}">coba</a> -->
                                                                        <a id="editAkunBaru"
                                                                            href="/admin/list/electra/editing/{{ $electra->id }}"
                                                                            type="button" class="btn btn-primary btn-md">
                                                                            Edit
                                                                        </a>

                                                                        <!-- <a id="editAkun" href="" type="button" class="btn btn-success">Verifikasi !</a> -->

                                                                        <!-- pendaftar online  -->
                                                                        @if ($electra->pembayaran_status == 1)
                                                                            <button type="button"
                                                                                class="btn btn-success btn-md"
                                                                                data-toggle="modal"
                                                                                data-target="#konfirmasi"
                                                                                onclick="konfirmasiModal({{ $electra->id }}, '{{ $electra->pembayaran_bukti }}');">
                                                                                Verifikasi
                                                                            </button>
                                                                        @endif

                                                                        <!-- pendaftar cp  -->
                                                                        @if ($electra->pembayaran_status == 3)
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button"
                                                                                class="btn btn-success btn-md"
                                                                                data-toggle="modal"
                                                                                data-target="#konfirmasiOffline"
                                                                                onclick="konfirmasiModal({{ $electra->id }}, '{{ $electra->pembayaran_bukti }}');">
                                                                                Verifikasi
                                                                            </button>
                                                                        @endif

                                                                        <!-- Button trigger modal -->
                                                                        {{-- <button type="button" class="btn btn-danger btn-md"
                                                                            data-toggle="modal" data-target="#hapus"
                                                                            onclick="hapusModal({{ $electra->id }});">
                                                                            Hapus
                                                                        </button> --}}

                                                                        <button type="button"
                                                                            class="btn btn-success btn-md"
                                                                            data-toggle="modal" data-target="#lihatData"
                                                                            onclick="lihatData({{ $electra->id }}, '{{ $electra->pembayaran_bukti }}');">
                                                                            Lihat Data
                                                                        </button>

                                                                        <!-- Button trigger modal loloskan -->
                                                                        @if ($electra->status_lolos == 0)
                                                                            <button type="button"
                                                                                class="btn btn-warning btn-md"
                                                                                data-toggle="modal" data-target="#lolos"
                                                                                onclick="loloskanPeserta({{ $electra->id }});">
                                                                                Peserta Lolos
                                                                            </button>
                                                                        @endif

                                                                        <div class="modal fade" id="edit"
                                                                            data-backdrop="static" data-keyboard="false"
                                                                            tabindex="-1"
                                                                            aria-labelledby="staticBackdropLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" id="edit"
                                                                                data-backdrop="static"
                                                                                data-keyboard="false" tabindex="-1"
                                                                                aria-labelledby="staticBackdropLabel"
                                                                                aria-hidden="true">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body">
                                                                                        <form method="POST"
                                                                                            enctype="multipart/form-data"
                                                                                            action="{{ route('admin.actionTabelElectraEdit') }}">
                                                                                            @csrf
                                                                                            <h1>{{ $electra->email }}</h1>

                                                                                            <button
                                                                                                data-target="#daftarelectra"
                                                                                                type="submit"
                                                                                                value="daftar"
                                                                                                class="btn btn-md"
                                                                                                style="color: white ;width: 100%; background-color: #1a174d">
                                                                                                Update
                                                                                            </button>

                                                                                            <button type="submit"
                                                                                                value="daftar"
                                                                                                data-dismiss="modal"
                                                                                                class="btn btn-secondary mt-2"
                                                                                                style="width: 100%;">
                                                                                                Tutup
                                                                                            </button>

                                                                                            <hr class="my-4" />
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <!-- Modal verifikasi offline -->
        <div class="modal fade" id="konfirmasiOffline" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Verifikasi peserta ?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="konfirmasiBtnFinalOffline" href="" type="button"
                            class="btn btn-success">Verifikasi !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lihat Data offline -->
        <div class="modal fade" id="lihatData" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Lihat Data Peserta</h3>
                        {{-- add close button --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Verifikasi pembayaran peserta ?</h3>
                    </div>
                    <img id="gambarBuktiPembayaran" style="width:100%;" src="">
                    <div class="modal-footer">
                        <a id="konfirmasiBtnFinal" href="" type="button" class="btn btn-success">Verifikasi
                            !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="hapus" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Hapus data peserta ?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="hapusBtnFinal" href="" type="button" class="btn btn-danger">Hapus !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Verifikasi peserta lolos -->
        <div class="modal fade" id="lolos" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Loloskan peserta?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="loloskan" href="" type="button" class="btn btn-success">Loloskan !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function konfirmasiModal(mHref, mSrc) {
                // alert(mSrc);
                document.getElementById("gambarBuktiPembayaran").src = "{{ asset('/storage/') }}/" + mSrc;
                document.getElementById("konfirmasiBtnFinalOffline").href = "{{ url('/admin/list/electra/konfirmasi') }}/" +
                    mHref;
                document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/list/electra/konfirmasi') }}/" + mHref;
            }

            function lihatData(mHref, mSrc) {
                // alert(mSrc);
                document.getElementById("gambarBuktiPembayaran").src = "{{ asset('/storage/') }}/" + mSrc;
                document.getElementById("konfirmasiBtnFinalOffline").href = "{{ url('/admin/list/electra/konfirmasi') }}/" +
                    mHref;
            }

            function hapusModal(mHref) {
                document.getElementById("hapusBtnFinal").href = "{{ url('/admin/list/electra/delete') }}/" + mHref;
            }

            function editModal(mHref) {
                document.getElementById("editAkun").href = "{{ url('/admin/list/electra/editing') }}/" + mHref;
            }

            function loloskanPeserta(mHref) {
                document.getElementById("loloskan").href = "{{ url('/admin/list/electra/lolos') }}/" + mHref;
            }
        </script>

    @endsection
