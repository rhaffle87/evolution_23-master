@extends('admin/template/admin-template')

@section('title', 'List Baronas Admins | Evolution 2023')

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
                                        Baronas</a></li>
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
                            <a href="{{ url('/admin/excel/baronas-robot') }}" class="">
                                <button class="btn btn-md bg-success" style="color: white;">Export <i
                                        class="fas fa-file-excel ml-2"></i></button>
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
                                                        <th>Asal Sekolah/Institusi</th>
                                                        <th>Kategori</th>
                                                        <th>Region</th>
                                                        <th>Gelombang</th>
                                                        <th>Pembayaran</th>
                                                        <th>Tanggal Daftar</th>
                                                        <th>Email</th>
                                                        <th>Aksi</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_baronas as $baronas)
                                                        <!-- region  -->
                                                        @if ($baronas->region == null)
                                                            <?php $x = 0;
                                                            $y = 0; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Jabodetabek')
                                                            <?php $x = 1;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Banyuwangi')
                                                            <?php $x = 0;
                                                            $y = 8; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Madiun')
                                                            <?php $x = 0;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Tuban')
                                                            <?php $x = 1;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Semarang')
                                                            <?php $x = 1;
                                                            $y = 3; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Malang')
                                                            <?php $x = 0;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Surabaya')
                                                            <?php $x = 0;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Sidoarjo')
                                                            <?php $x = 0;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Bali')
                                                            <?php $x = 1;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Gresik')
                                                            <?php $x = 0;
                                                            $y = 2; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Kalimantan')
                                                            <?php $x = 1;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Jember')
                                                            <?php $x = 0;
                                                            $y = 9; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Kediri')
                                                            <?php $x = 0;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Mojokerto')
                                                            <?php $x = 0;
                                                            $y = 3; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Madura')
                                                            <?php $x = 1;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Probolinggo')
                                                            <?php $x = 1;
                                                            $y = 0; ?>
                                                        @endif

                                                        @if ($baronas->region == 'Solo')
                                                            <?php $x = 1;
                                                            $y = 2; ?>
                                                        @endif

                                                        <!-- kategori -->
                                                        @if ($baronas->kategori == 'SD')
                                                            <?php $k = 1; ?>
                                                        @endif

                                                        @if ($baronas->kategori == 'SMP')
                                                            <?php $k = 2; ?>
                                                        @endif

                                                        @if ($baronas->kategori == 'SMA')
                                                            <?php $k = 3; ?>
                                                        @endif

                                                        @if ($baronas->kategori == 'UMUM')
                                                            <?php $k = 4; ?>
                                                        @endif

                                                        <!-- id  -->
                                                        @if ($baronas->id / 10 < 1)
                                                            <?php $a = 0;
                                                            $b = 0;
                                                            $c = substr($baronas->id, 0, 1); ?>
                                                        @endif
                                                        @if ($baronas->id / 10 < 10 && $baronas->id / 10 >= 1)
                                                            <?php $a = 0;
                                                            $b = substr($baronas->id, 0, 1);
                                                            $c = substr($baronas->id, 1, 1); ?>
                                                        @endif
                                                        @if ($baronas->id / 10 > 10)
                                                            <?php $a = substr($baronas->id, 0, 1);
                                                            $b = substr($baronas->id, 1, 1);
                                                            $c = substr($baronas->id, 2, 1); ?>
                                                        @endif
                                                        <!-- @if ($baronas->id / 10 > 100)
    <?php $a = substr($electra->id, 0, 1);
    $b = substr($electra->id, 1, 1);
    $c = substr($electra->id, 2, 1);
    $d = substr($electra->id, 3, 1); ?>
    @endif -->

                                                        <!-- gelombang -->
                                                        <?php $e = $baronas->gelombang; ?>

                                                        <tr>
                                                            <td><?= $x . $y . '-' . '00' . $k . '-' . $a . $b . $c . '-' . $e ?>
                                                            </td>
                                                            <td>{{ $baronas->nama_tim }}</td>
                                                            <td>{{ $baronas->nama_ketua }}</td>
                                                            <td>{{ $baronas->sekolah }}</td>
                                                            <td>{{ $baronas->kategori }}</td>
                                                            <td>
                                                                @if ($baronas->region == '')
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-success">Online</span>
                                                                @endif

                                                                @if ($baronas->region != '')
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-primary">{{ $baronas->region }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($baronas->gelombang == 0)
                                                                    <span>-</span>
                                                                @else
                                                                    {{ $baronas->gelombang }}
                                                                @endif
                                                            </td>
                                                            <td>

                                                                @if ($baronas->pembayaran_status == 0)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-secondary">Menunggu
                                                                        pembayaran</span>
                                                                @endif

                                                                @if ($baronas->pembayaran_status == 1)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-warning">Belum
                                                                        dikonfirmasi</span>
                                                                @endif

                                                                @if ($baronas->pembayaran_status == 2)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-success">LUNAS</span>
                                                                @endif

                                                                @if ($baronas->pembayaran_status == 3 || $baronas->pembayaran_status == 4)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-primary">LANGSUNG</span>
                                                                @endif

                                                            </td>
                                                            <td>{{ $baronas->created_at }}</td>
                                                            <td>
                                                                @if ($baronas->email_sent)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-success">Sudah</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-danger">Belum</span>
                                                                @endif
                                                            </td>
                                                            <td style="text-align: center">
                                                                <a
                                                                    href="/admin/baronas-robot/kirim-email/{{ $baronas->id }}">
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        style="margin-right: 8px">
                                                                        Kirim Email
                                                                    </button>
                                                                </a>
                                                                <a href="/admin/edit/baronas-robot/{{ $baronas->id }}">
                                                                    <button type="button" class="btn btn-primary btn-md"
                                                                        style="margin-right: 8px">
                                                                        Edit
                                                                    </button>
                                                                </a>

                                                                <!-- pendaftar online -->
                                                                @if ($baronas->pembayaran_status == 1)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#konfirmasi"
                                                                        onclick="konfirmasiModal({{ $baronas->id }}, '{{ $baronas->pembayaran_bukti }}');">
                                                                        Verifikasi
                                                                    </button>

                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal"
                                                                        data-target="#lihatBuktiTransfer"
                                                                        onclick="lihatDataTF({{ $baronas->id }}, '{{ $baronas->pembayaran_bukti }}');">
                                                                        Bukti TF
                                                                    </button>
                                                                @endif

                                                                <!-- pendaftar cp -->
                                                                @if ($baronas->pembayaran_status == 3)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#konfirmasiOffline"
                                                                        onclick="konfirmasiModal({{ $baronas->id }}, '{{ $baronas->pembayaran_bukti }}');">
                                                                        Verifikasi
                                                                    </button>
                                                                @endif

                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-danger btn-md"
                                                                    data-toggle="modal" data-target="#hapus"
                                                                    onclick="hapusModal({{ $baronas->id }});">
                                                                    Hapus
                                                                </button>

                                                            </td>
                                                            <td>
                                                                @if ($baronas->file_ktp_ketua != null)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#lihatData"
                                                                        onclick="lihatData({{ $baronas->id }}, '{{ $baronas->file_ktp_ketua }}');">
                                                                        KTP Ketua
                                                                    </button>
                                                                @endif
                                                                @if ($baronas->file_ktp_anggota != null)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#lihatData"
                                                                        onclick="lihatData({{ $baronas->id }}, '{{ $baronas->file_ktp_anggota }}');">
                                                                        KTP Anggota
                                                                    </button>
                                                                @endif
                                                                @if ($baronas->file_ktp_anggotadua != null)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#lihatData"
                                                                        onclick="lihatData({{ $baronas->id }}, '{{ $baronas->file_ktp_anggotadua }}');">
                                                                        KTP Anggota Dua
                                                                    </button>
                                                                @endif
                                                                @if ($baronas->pembayaran_status == 2 || $baronas->pembayaran_status == 4)
                                                                    {{-- <a href="/admin/list/baronas-robot/bukti-tf/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">Bukti
                                                                        Transfer</a> --}}
                                                                @endif
                                                                @if ($baronas->kategori == 'UMUM')
                                                                    <a href="/storage/app/{{ $baronas->upload_twibbon }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">SS
                                                                        Twibbon</a>
                                                                    <a href="/admin/list/baronas-robot/abstrak/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">File
                                                                        Abstrak</a>
                                                                    <!-- <a href="/admin/list/baronas-robot/file/{{ $baronas->id }}" target="_blank" class="badge badge-secondary badge-md">File Abstrak</a> -->
                                                                @endif
                                                                @if ($baronas->file_full_paper != null)
                                                                    <a href="/admin/list/baronas-robot/full-paper/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">File Full
                                                                        Paper</a>
                                                                @endif
                                                                @if ($baronas->link_drive != null)
                                                                    <a href="{{ $baronas->link_drive }}" target="_blank"
                                                                        class="badge badge-secondary badge-md">Link
                                                                        Drive</a>
                                                                @endif
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

        <div class="modal fade" id="lihatData" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Lihat Data Peserta</h3>
                        {{-- make a close button --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img id="gambarData" style="width:100%;" src="">
                </div>
            </div>
        </div>

        <div class="modal fade" id="lihatBuktiTransfer" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Lihat Data Transfer</h3>
                        {{-- make a close button --}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img id="gambarDataTF" style="width:100%;" src="">
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
        <!-- Modal -->
        <!-- <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                                                    </div> -->

        <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Verifikasi pembayaran peserta ?</h3>
                    </div>
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

        <script type="text/javascript">
            function konfirmasiModal(mHref, mSrc) {
                // alert(mSrc);
                // document.getElementById("gambarBuktiPembayaran").src = "{{ url('/storage/app') }}/" + mSrc;
                document.getElementById("konfirmasiBtnFinalOffline").href =
                    "{{ url('/admin/list/baronas-robot/konfirmasi') }}/" +
                    mHref;
                document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/list/baronas-robot/konfirmasi') }}/" +
                    mHref;
            }

            function hapusModal(mHref) {
                document.getElementById("hapusBtnFinal").href = "{{ url('/admin/list/baronas-robot/delete') }}/" + mHref;
            }

            // function editModal(mHref) {
            // document.getElementById("editBtnFinal").href = "{{ url('/admin/list/baronas-robot/edit') }}/" + mHref;
            // }
            function lihatData(mHref, mSrc) {
                // check if msrc has "/public/" then delete the "/public/"
                if (mSrc.includes("public/")) {
                    mSrc = mSrc.replace("public/", "");
                }
                console.log(mSrc);
                document.getElementById("gambarData").src = "{{ asset('/storage/') }}/" + mSrc;
            }

            function lihatDataTF(mHref, mSrc) {
                let fixbug = mSrc.replace("public", "")
                document.getElementById("gambarDataTF").src = "{{ asset('/storage/') }}/" + fixbug;
            }
        </script>

    @endsection
