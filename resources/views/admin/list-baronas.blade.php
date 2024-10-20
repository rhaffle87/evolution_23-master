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
                            <a href="{{ url('/admin/excel/baronas') }}" class="">
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
                                                            <td style="text-align: center">
                                                                <a href="/admin/edit/baronas/{{ $baronas->id }}">
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

                                                                    <a href="/admin/list/baronas/bukti-tf/{{ $baronas->id }}"
                                                                        target="_blank" class="btn btn-secondary">Bukti
                                                                        Transfer</a>
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
                                                                <button type="button" class="btn btn-success btn-md"
                                                                    data-toggle="modal" data-target="#lihatData"
                                                                    onclick="lihatData({{ $baronas->id }}, '{{ $baronas->file_ktp_ketua }}');">
                                                                    KTP Ketua
                                                                </button>
                                                                <a href="/admin/list/baronas/ktp-anggota/{{ $baronas->id }}"
                                                                    target="_blank"
                                                                    class="badge badge-secondary badge-md">KTP Anggota</a>
                                                                <a href="/admin/list/baronas/ktp-anggota-dua/{{ $baronas->id }}"
                                                                    target="_blank"
                                                                    class="badge badge-secondary badge-md">KTP Anggota
                                                                    Dua</a>
                                                                @if ($baronas->pembayaran_status == 2 || $baronas->pembayaran_status == 4)
                                                                    <a href="/admin/list/baronas/bukti-tf/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">Bukti
                                                                        Transfer</a>
                                                                @endif
                                                                @if ($baronas->kategori == 'UMUM')
                                                                    <a href="/storage/app/{{ $baronas->upload_twibbon }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">SS
                                                                        Twibbon</a>
                                                                    <a href="/admin/list/baronas/abstrak/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">File
                                                                        Abstrak</a>
                                                                    <!-- <a href="/admin/list/baronas/file/{{ $baronas->id }}" target="_blank" class="badge badge-secondary badge-md">File Abstrak</a> -->
                                                                @endif
                                                                @if ($baronas->file_full_paper != null)
                                                                    <a href="/admin/list/baronas/full-paper/{{ $baronas->id }}"
                                                                        target="_blank"
                                                                        class="badge badge-secondary badge-md">File Full
                                                                        Paper</a>
                                                                @endif
                                                                @if ($baronas->link_video != null)
                                                                    <a href="{{ $baronas->link_video }}" target="_blank"
                                                                        class="badge badge-secondary badge-md">Link
                                                                        Video</a>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <!-- <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-body">
                                                                                                            <form method="POST" enctype="multipart/form-data" action="">
                                                                                                                @csrf
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Email (Jangan diubah hubungi divisi web)</label>
                                                                                                                    <input name="email" type="text" id="email" class="form-control" placeholder="email" value="{{ $baronas->email }}" maxlength="15" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Nama Tim</label>
                                                                                                                    <input name="nama_tim" type="text" id="nama-tim" class="form-control" placeholder="Nama Tim" value="{{ $baronas->nama_tim }}" maxlength="15" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Nama Ketua</label>
                                                                                                                    <input name="nama_ketua" type="text" id="nama-ketua" class="form-control" value="{{ $baronas->nama_ketua }}" placeholder="Nama Lengkap" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Nama Anggota 1 (Kosong : '—')</label>
                                                                                                                    <input name="nama_anggota" type="text" id="nama-anggota" class="form-control" placeholder="Nama Lengkap" value="{{ $baronas->nama_anggota }}" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Nama Anggota 2 (Kosong : '—')</label>
                                                                                                                    <input name="nama_anggotadua" type="text" id="nama-anggotadua" class="form-control" placeholder="Nama Lengkap" value="{{ $baronas->nama_anggotadua }}" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Asal Sekolah/Instansi </label>
                                                                                                                    <input name="sekolah" type="text" id="sekolah" class="form-control" placeholder="Contoh : SMA Negeri 1 Surabaya" value="{{ $baronas->sekolah }}" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-name">Alamat Sekolah/Instansi </label>
                                                                                                                    <input name="alamat_sekolah" type="text" id="alamat-sekolah" class="form-control" placeholder="Contoh : Jalan Wijaya Kusuma No. 48 Surabaya" value="{{ $baronas->alamat_sekolah }}" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-phone">Nama Pembina</label>
                                                                                                                    <input name="nama_pembina" type="text" id="nama-pembina" class="form-control" placeholder="Nama Lengkap" value="{{ $baronas->nama_pembina }}" required>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label class="form-control-label" for="input-phone">Nomor HP Ketua</label>
                                                                                                                    <input name="nomor_hp" type="number" id="nomor-hp" class="form-control" placeholder="Contoh : 08123456789" value="{{ $baronas->nomor_hp }}" required>
                                                                                                                </div>
                                                                                                                
                                                            
                                                                                                                <! Button trigger modal >
                                                                                                                <button data-target="#daftarbaronas" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                                                                                    Update
                                                                                                                </button>
                                                            
                                                                                                                <button type="submit" value="daftar" data-dismiss="modal" class="btn btn-secondary mt-2" style="width: 100%;">
                                                                                                                    Tutup
                                                                                                                </button>
                                                                                                                </div>
                                                                                                                <hr class="my-4" />
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div> -->
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
                    </div>
                    <img id="gambarData" style="width:100%;" src="">
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
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h3 class="mt-3">Verifikasi pembayaran peserta ?</h3>
                                                            </div>
                                              <div class="modal-footer">
                                                                <a id="konfirmasiBtnFinal" href="" type="button" class="btn btn-success">Verifikasi ?</a>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
                document.getElementById("konfirmasiBtnFinalOffline").href = "{{ url('/admin/list/baronas/konfirmasi') }}/" +
                    mHref;
                document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/list/baronas/konfirmasi') }}/" + mHref;
            }

            function hapusModal(mHref) {
                document.getElementById("hapusBtnFinal").href = "{{ url('/admin/list/baronas/delete') }}/" + mHref;
            }

            function lihatData(mHref, mSrc) {
                document.getElementById("gambarData").src = "{{ asset('/storage/') }}/" + mSrc;
            }
        </script>

    @endsection
