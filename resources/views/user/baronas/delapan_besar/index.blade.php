@extends('user.template.user-template')

@section('title', '8 Besar Baronas')

@section('container')
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"
                                            style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">8 Besar Baronas</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($notification = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $notification }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if ($notification = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $notification }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        @foreach ($baronas_8_besar_matches as $match)
                            <div class="row">
                                <div class="col-6">
                                    @if ($match->status == 1)
                                        <h4 class="mb-3">Sedang Bertanding</h4>
                                    @elseif($match->status == 2)
                                        <h4 class="mb-3">Akan Bertanding</h4>
                                    @else
                                        <h4 class="mb-3">Menunggu Giliran</h4>
                                    @endif
                                </div>
                                <div class="col-2">
                                    <h4 class="mb-3"> : </h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="mb-3">Kelompok {{ $match->kelompok }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($baronas_8_besar_matches as $match)
                    <div class="row">
                        <div class="col-6 give-box">
                            <div class="container">
                                <div class="row">
                                    <div class=" col-12 d-flex justify-content-center">
                                        <h3>Kelompok {{ $match->kelompok }} - Giliran {{ $match->giliran }}</h3>
                                    </div>
                                    <div class="col-6 give-box bg-grey">
                                        <h3 class="text-end">
                                            {{ $match->team1->baronas->nama_tim }}
                                        </h3>
                                    </div>
                                    <?php
                                    try {
                                        if ($match->result == $match->team1_id) {
                                            $baronas_name = $match->team1->baronas->nama_tim;
                                        } elseif ($match->result == $match->team2_id) {
                                            $baronas_name = $match->team2->baronas->nama_tim;
                                        } else {
                                            $baronas_name = 'Belum ada';
                                        }
                                    } catch (Exception $e) {
                                        $baronas_name = 'Belum ada';
                                    }
                                    ?>
                                    <div class="col-12 d-flex justify-content-end">
                                        <h3 class="text-end the-result px-5">
                                            {{ $baronas_name }}
                                        </h3>
                                    </div>
                                    <div class="col-6 give-box">
                                        <h3 class="text-end">
                                            {{ $match->team2->baronas->nama_tim }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .row {
            text-align: center;
        }

        .give-box {
            border-radius: 20px;
            margin: 10px;
            border: 1px solid #000;
            display: inline-block;
            float: none !important;
        }

        .container .col-12 .the-user {
            border-radius: 20px;
            margin: 10px;
            border: 1px solid #000;
            display: inline-block;
            float: none !important;
        }

        .container .col-5 .the-result {
            border-radius: 20px;
            margin: 10px;
            border: 1px solid #000;
            display: inline-block;
            float: none !important;
        }


        .container .col-12 .the-result {
            border-radius: 20px;
            margin: 10px;
            border: 1px solid #000;
            display: inline-block;
            float: none !important;
        }

        .row h1,
        .row p {
            font-style: italic;
            text-align: left;
        }

        .row h1 {
            font-size: 1.4em;
        }

        .row p {
            font-size: 1em;
        }
    </style>
@endpush
