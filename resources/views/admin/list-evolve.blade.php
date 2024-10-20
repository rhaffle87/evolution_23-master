@extends('admin/template/admin-template')

@section('title', 'List Evolve Admin | Evolution 2023')

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
                                        Evolve</a>
                                </li>
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
                    <!-- <img src="/img/brand/EVOLVE.png" class="card-img-top p-2" alt="Logo Evolve" style="width: 50%; margin: 0 auto;"> -->
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: xx-large; text-align: left;">
                            <!-- <img src="/img/brand/TEXT_EVOLVE.png" alt=""> -->
                            <a href="{{ url('/admin/excel/evolve') }}" class="">
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
                                                        <th>Id</th>
                                                        <th>No Pendaftaran</th>
                                                        <th>Nama</th>
                                                        <th>No Telp</th>
                                                        <th>Institusi</th>
                                                        <th>Alamat</th>
                                                        <th>Status Pendaftaran</th>
                                                        <th>Tanggal Daftar</th>
                                                        <th>Aksi</th>
                                                        <th>Terverifikasi</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($list_evolve as $evolve)
                                                        <tr>
                                                            <td>{{ $evolve->id }}</td>
                                                            <td>{{ $evolve->no_pendaftaran }}</td>
                                                            <td>{{ $evolve->nama }}</td>
                                                            <td>{{ $evolve->nomor_telp }}</td>
                                                            <td>{{ $evolve->institusi }}</td>
                                                            <td>{{ $evolve->alamat }}</td>

                                                            <td>{{ $evolve->nama_kedua }}</td>
                                                            <td>{{ $evolve->nomor_telp_kedua }}</td>
                                                            <td>{{ $evolve->institusi_kedua }}</td>
                                                            <td>{{ $evolve->alamat_kedua }}</td>

                                                            <td>{{ $evolve->nama_kedua }}</td>
                                                            <td>{{ $evolve->nomor_telp_kedua }}</td>
                                                            <td>{{ $evolve->institusi_kedua }}</td>
                                                            <td>{{ $evolve->alamat_kedua }}</td>
                                                            <td>

                                                                @if ($evolve->pembayaran_status == 0)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-secondary">Menunggu
                                                                        pembayaran</span>
                                                                @endif

                                                                @if ($evolve->pembayaran_status == 1)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-warning">Belum
                                                                        dikonfirmasi</span>
                                                                @endif

                                                                @if ($evolve->pembayaran_status == 2)
                                                                    <span
                                                                        class="badge badge-pill badge-lg badge-success">LUNAS</span>
                                                                @endif

                                                            </td>
                                                            <td>{{ $evolve->created_at }}</td>
                                                            <td style="text-align: center">
                                                                <!-- <a href="{{ url('/admin/list/evolve/konfirmasi') }}/{{ $evolve->id }}">coba</a> -->
                                                                <a id="editAkunBaru"
                                                                    href="/admin/list/evolve/editing/{{ $evolve->id }}"
                                                                    type="button" class="btn btn-primary btn-md"> Edit
                                                                </a>
                                                                <!-- pendaftar online  -->
                                                                @if ($evolve->pembayaran_status == 1)
                                                                    <button type="button" class="btn btn-success btn-md"
                                                                        data-toggle="modal" data-target="#konfirmasi"
                                                                        onclick="konfirmasiModal({{ $evolve->id }}, '{{ $evolve->pembayaran_bukti }}');">
                                                                        Verifikasi
                                                                    </button>
                                                                @endif

                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-danger btn-md"
                                                                    data-toggle="modal" data-target="#hapus"
                                                                    onclick="hapusModal({{ $evolve->id }});">
                                                                    Hapus
                                                                </button>

                                                                <div class="modal fade" id="edit"
                                                                    data-backdrop="static" data-keyboard="false"
                                                                    tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" id="edit"
                                                                        data-backdrop="static" data-keyboard="false"
                                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <form method="POST"
                                                                                    enctype="multipart/form-data"
                                                                                    action="{{ route('admin.actionTabelEvolveEdit') }}">
                                                                                    @csrf
                                                                                    <h1>{{ $evolve->email }}</h1>

                                                                                    <button data-target="#daftarevolve"
                                                                                        type="submit" value="daftar"
                                                                                        class="btn btn-md"
                                                                                        style="color: white ;width: 100%; background-color: #1a174d">
                                                                                        Update
                                                                                    </button>

                                                                                    <button type="submit" value="daftar"
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
                                                            <td><a href="/storage/{{ $evolve->pembayaran_bukti }}"
                                                                    target="_blank"
                                                                    class="badge badge-secondary badge-md">Bukti
                                                                    pembayaran</a>
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


        <!-- Modal Verif -->
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

        <script type="text/javascript">
            function konfirmasiModal(mHref, mSrc) {
                // alert(mSrc);
                document.getElementById("gambarBuktiPembayaran").src = "{{ url('/storage') }}/" + mSrc;
                document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/list/evolve/konfirmasi') }}/" + mHref;
            }

            function hapusModal(mHref) {
                document.getElementById("hapusBtnFinal").href = "{{ url('/admin/list/evolve/delete') }}/" + mHref;
            }

            function editModal(mHref) {
                document.getElementById("editAkun").href = "{{ url('/admin/list/evolve/editing') }}/" + mHref;
            }
        </script>

    @endsection
