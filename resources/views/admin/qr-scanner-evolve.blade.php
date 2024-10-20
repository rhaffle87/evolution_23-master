@extends('admin/template/admin-template')

@section('title', 'SCANNER EVOLVE | EVOLVE 2023')

@section('container')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVOLVE QR SCANNER</title>
    <!-- <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script> -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="jquery-3.6.4.min.js"></script>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #reader {
            width: 600px;
            margin: auto;
            margin-top: 5em
            /* flex: auto */
            /* transform: scaleX(-100%) */
        }

        #no_ticket {
            text-align: center;
            font-size: 1.5rem;
        }

        video#no_ticket {
            transform: scaleX(-100%);
        }
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

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col" id="reader"></div>
            <div class="col" id="no_ticket" ></div>
        </div>
        <div class="row">
            <form onsubmit="checkIn()">
                <label for="no_ticket"> Masukkan No Tiket:</label>
                <input type="text" id="no_ticket" name="no_ticket"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    
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
                                
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No Peserta</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Email </th>
                                                        <th>No Identitas</th>
                                                        <th>Harga Tiket</th>
                                                        <th>Status Pembayaran</th>
                                                        <th>Tiket dikirim</th>
                                                        <th>Liat Data</th>
                                                        <th>Aksi</th>
                                                        <th>Jml Check in</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_evolve as $evolve)
                                                        <tr>
                                                            <td>{{ $evolve->id }}</td>
                                                            <td>{{ $evolve->nama }}</td>
                                                            <td>{{ $evolve->email }}</td>
                                                            <td>{{ $evolve->no_identitas }}</td>
                                                            <td>{{ $evolve->total_harga }}</td>
                                                            <td>
                                                                @if ($evolve->pembayaran_status == 0)
                                                                    Bukti belum dikirim
                                                                @endif
                                                                @if ($evolve->pembayaran_status == 1)
                                                                    Bukti sudah dikirim
                                                                @endif
                                                                @if ($evolve->pembayaran_status == 2)
                                                                    Pembayaran Terverifikasi
                                                                @endif
                                                            
                                                            </td>
                                                            <td>{{ $evolve->is_ticket_send }}</td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $evolve->pembayaran_bukti) }}"
                                                                    target="_blank">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-success btn-md"
                                                                data-toggle="modal" onclick="konfirmasiBayar({{ $evolve->id }})" data-target="#konfirmasi">
                                                                Verifikasi Pembayaran
                                                                </button>
                                                                <button type="button" class="btn btn-success btn-md"
                                                                data-toggle="modal" onclick="kirimTiket({{ $evolve->id }})" data-target="#konfirmasiKirim">
                                                                Kirim Tiket
                                                                </button>
                                                            </td>
                                                            <td>{{ $evolve->checked_in }} / {{ $evolve->jumlah_tiket }}</td>

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
    </div>
    

</body>
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        }, // Sets dimensions of scanning box (set relative to reader element width)
        fps: 30, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success(no_ticket) {
        scanner.clear();

        window.location.replace("check_in/" + no_ticket);

        
    }

    function error(err) {
        console.error(err);
    }

    function checkIn()
    {
        var inputVal = document.getElementById("no_ticket").value;
        window.location.replace("check_in/" + no_ticket);

    }

    function konfirmasiBayar(mHref)
    {
        document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/evolve/verif_bayar') }}/" + mHref;
    }
    function kirimTiket(mHref)
    {
        document.getElementById("konfirmasiTiketFinal").href = "{{ url('/admin/evolve/kirim_tiket') }}/" + mHref;
    }
</script>

</html>


@endsection
