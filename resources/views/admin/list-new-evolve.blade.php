@extends('admin/template/admin-template')

@section('title', 'LIST ADMIN EVOLVE| EVOLVE 2023')

@section('container')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABEL ADMIN EVOLVE</title>
    <!-- <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script> -->
    <script ></script>
    <script src="jquery-3.6.4.min.js"></script>
    <style>
    </style>

</head>

<body>
    <!-- Header -->
    <div class="header bg-default pb-3">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"
                                            style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Daftar Peserta
                                        Evolve</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- List Evolve --}}
    
        <div class="row">
            <div class="col-12" style="width: 100%;">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                               
                                @if ($notification = Session::get('success'))
                                    <div class="alert alert-danger alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    {{ $notification }}
                                </div>
                                @endif

                                @if ($notification = Session::get('paid-success'))
                                <div class="alert alert-danger alert-block">
                                    {{ $notification }}
                                </div>
                                @endif
                                @if ($notification = Session::get('paid-fail'))
                                <div class="alert alert-danger alert-block">
                                    {{ $notification }}
                                </div>
                                @endif
                                
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Email </th>
                                                        <th>Instansi</th>
                                                        <th>Nama Band</th>
                                                        <th>List Nama Anggota</th>
                                                        <th>Lihat Data</th>
                                                        <th>Aksi</th>
                                                        <th>Terverifikasi</th>
                                                        <th>Link Youtube</th>
                                                        <th>Top 5<th>
                                                        <th>No Telp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_evolve as $evolve)
                                                    <tr>
                                                        <td>{{ $evolve->id }}</td>
                                                        <td>{{ $evolve->nama }}</td>
                                                        <td>{{ $evolve->email }}</td>
                                                        <td>{{ $evolve->instansi }}</td>
                                                        <td>{{ $evolve->nama_band }}</td>
                                                        <td>
                                                            <p>{{ $evolve->nama1 }}</p>
                                                            <p>{{ $evolve->nama2 }}</p>
                                                            <p>{{ $evolve->nama3 }}</p>
                                                            <p>{{ $evolve->nama4 }}</p>
                                                            <p>{{ $evolve->nama5 }}</p>
                                                            <p>{{ $evolve->nama6 }}</p>
                                                            <p>{{ $evolve->nama7 }}</p>
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('storage/' . $evolve->scan) }}"
                                                                target="_blank">
                                                                <button class="btn btn-sm btn-primary">Scan</button>
                                                            </a>
                                                            <a href="{{ asset('storage/' . $evolve->instagram) }}"
                                                                target="_blank">
                                                                <button class="btn btn-sm btn-primary">Instagram</button>
                                                            </a>
                                                            <a href="{{ asset('storage/' . $evolve->tiktok) }}"
                                                                target="_blank">
                                                                <button class="btn btn-sm btn-primary">Tiktok</button>
                                                            </a>
                                                            <a href="{{ asset('storage/' . $evolve->pembayaran_bukti) }}"
                                                                target="_blank">
                                                                <button class="btn btn-sm btn-primary">Pembayaran</button>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success btn-md"
                                                            data-toggle="modal" onclick="konfirmasiBayar({{ $evolve->id }})" data-target="#konfirmasi">
                                                            Verifikasi Pembayaran
                                                            </button>
                                                            <button type="button" class="btn btn-success btn-md"
                                                            data-toggle="modal" onclick="verifikasiTop5({{ $evolve->id }})" data-target="#konfirmasiTop5">
                                                            Verifikasi Top 5
                                                            </button>
                                                        </td>
                                                        <td>
                                                            @if ($evolve->pembayaran_status == 2)
                                                                <p>Sudah</p>
                                                            @else
                                                                <p>Belum</p>
                                                            @endif
                                                        <td><a href="{{ $evolve->link_youtube }}">{{ $evolve->link_youtube }}</a></td>
                                                        <td>{{ $evolve->top_5 }}
                                                        </td>
                                                        <td>{{ $evolve->no_telp }}</td>
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

        <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">
                            Verifikasi pembayaran peserta?
                        </h3>
                    </div>
                    <div class="modal-footer">
                        <a id="konfirmasiBtnFinal" href="" type="button" class="btn btn-success">Verifikasi
                            !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        
        </div>

        <div class="modal fade" id="konfirmasiTop5" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="mt-3">
                        Verifikasi TOP 5?
                    </h3>
                </div>
                <div class="modal-footer">
                    <a id="konfirmasiBtnFinalTop5" href="" type="button" class="btn btn-success">Verifikasi
                        !</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    
    </div>

        <div class="modal fade" id="konfirmasiKirim" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">
                            Kirim Tiket?
                        </h3>
                    </div>
                    <div class="modal-footer">
                        <a id="konfirmasiTiketFinal" href="" type="button" class="btn btn-success">Kirim
                            !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        
        </div>
    

    </body>

    <script>
    function konfirmasiBayar(mHref)
    {
        document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/evolve/verif_bayar') }}/" + mHref;
    }

    function verifikasiTop5(mHref)
    {
        document.getElementById("konfirmasiBtnFinalTop5").href = "{{ url('/admin/evolve/verif_top5') }}/" + mHref;
    }
    </script>



@endsection
