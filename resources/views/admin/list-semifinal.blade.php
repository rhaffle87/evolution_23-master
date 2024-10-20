@extends('admin/template/admin-template')

@section('title', 'List Semifinal | Evolution 2023')

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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Hasil Semifinal
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
                    <!-- <img src="/img/brand/ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto; translate: scale(0.1)"> -->
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                            <img src="/img/brand/TEXT_ELECTRA.png" alt="">
                        </h5>

                        <div class="row">
                            <div class="col">
                                <a href="{{ url('/semifinal/export') }}">
                                    <button class="btn btn-md bg-success" style="color: white;">Export <i
                                            class="fas fa-file-excel ml-2"></i></button>
                                </a>
                                <br>
                                <br>
                                @if ($notification = Session::get('email-fail'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $notification }}</strong>
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
                                                        <th>Tahap </th>
                                                        <!-- <th>Dasprog a</th>
                                                        <th>Dasprog b</th> -->
                                                        <th>Skor Pretest</th>
                                                        <th>Skor Rally</th>
                                                        <th>Skor Total (Pretest & Rally)</th>
                                                        <th>File Dasprog</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_semifinal as $sm)
                                                        <?php $e = 1; ?>
                                                        <!-- region  -->
                                                        @if ($sm->region == null)
                                                            <?php $x = 0;
                                                            $y = 0;
                                                            $e = 2; ?>
                                                        @endif

                                                        @if ($sm->region == 'Jabodetabek')
                                                            <?php $x = 1;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($sm->region == 'Banyuwangi')
                                                            <?php $x = 1;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($sm->region == 'Madiun')
                                                            <?php $x = 0;
                                                            $y = 9; ?>
                                                        @endif

                                                        @if ($sm->region == 'Tuban')
                                                            <?php $x = 0;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($sm->region == 'Semarang')
                                                            <?php $x = 1;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($sm->region == 'Malang')
                                                            <?php $x = 0;
                                                            $y = 5; ?>
                                                        @endif

                                                        @if ($sm->region == 'Surabaya')
                                                            <?php $x = 0;
                                                            $y = 1; ?>
                                                        @endif

                                                        @if ($sm->region == 'Sidoarjo')
                                                            <?php $x = 0;
                                                            $y = 2; ?>
                                                        @endif

                                                        @if ($sm->region == 'Bali')
                                                            <?php $x = 1;
                                                            $y = 6; ?>
                                                        @endif

                                                        @if ($sm->region == 'Gresik')
                                                            <?php $x = 0;
                                                            $y = 3; ?>
                                                        @endif

                                                        @if ($sm->region == 'Balikpapan')
                                                            <?php $x = 1;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($sm->region == 'Jember')
                                                            <?php $x = 1;
                                                            $y = 0; ?>
                                                        @endif

                                                        @if ($sm->region == 'Kediri')
                                                            <?php $x = 0;
                                                            $y = 8; ?>
                                                        @endif

                                                        @if ($sm->region == 'Mojokerto')
                                                            <?php $x = 0;
                                                            $y = 4; ?>
                                                        @endif

                                                        @if ($sm->region == 'Madura')
                                                            <?php $x = 1;
                                                            $y = 2; ?>
                                                        @endif

                                                        @if ($sm->region == 'Probolinggo')
                                                            <?php $x = 0;
                                                            $y = 7; ?>
                                                        @endif

                                                        @if ($sm->region == 'Solo')
                                                            <?php $x = 1;
                                                            $y = 3; ?>
                                                        @endif

                                                        <!-- id  -->
                                                        @if ($sm->no_pendaftaran / 10 < 1)
                                                            <?php $a = 0;
                                                            $b = 0;
                                                            $c = 0;
                                                            $d = substr($sm->no_pendaftaran, 0, 1); ?>
                                                            @endif @if ($sm->no_pendaftaran / 10 < 10 && $sm->no_pendaftaran / 10 >= 1)
                                                                <?php $a = 0;
                                                                $b = 0;
                                                                $c = substr($sm->no_pendaftaran, 0, 1);
                                                                $d = substr($sm->no_pendaftaran, 1, 1); ?>
                                                            @endif

                                                            @if ($sm->no_pendaftaran / 10 > 10 && $sm->no_pendaftaran / 10 < 100)
                                                                <?php $a = 0;
                                                                $b = substr($sm->no_pendaftaran, 0, 1);
                                                                $c = substr($sm->no_pendaftaran, 1, 1);
                                                                $d = substr($sm->no_pendaftaran, 2, 1); ?>
                                                                @endif @if ($sm->no_pendaftaran / 10 > 100)
                                                                    <?php $a = substr($sm->no_pendaftaran, 0, 1);
                                                                    $b = substr($sm->no_pendaftaran, 1, 1);
                                                                    $c = substr($sm->no_pendaftaran, 2, 1);
                                                                    $d = substr($sm->no_pendaftaran, 3, 1); ?>
                                                                @endif







                                                                <tr>
                                                                    <td><?= $x . $y . '-' . '10' . $a . '-' . $b . $c . $d . '-' . $e ?>
                                                                    </td>
                                                                    <td>{{ $sm->nama_tim }}</td>
                                                                    @if ($sm->tahap == null)
                                                                        <td> <span
                                                                                class="badge badge-pill badge-lg badge-primary">Pretest</span>
                                                                        </td>
                                                                    @endif
                                                                    @if ($sm->tahap == 1)
                                                                        <td> <span
                                                                                class="badge badge-pill badge-lg badge-warning">Praktikum</span>
                                                                        </td>
                                                                    @endif
                                                                    @if ($sm->tahap == 2)
                                                                        <td> <span
                                                                                class="badge badge-pill badge-lg badge-success">Rally</span>
                                                                        </td>
                                                                    @endif
                                                                    <!-- <td> {{ $sm->dasprog_a }}</td>
                                                                    <td> {{ $sm->dasprog_b }}</td> -->
                                                                    <td>{{ $sm->skor_pretest == null ? '0' : $sm->skor_pretest }}
                                                                    </td>
                                                                    <td>{{ $sm->skor_rally == null ? '0' : $sm->skor_rally }}</td>
                                                                    <td>{{ $sm->skor_rally + $sm->skor_pretest == null ? '0' : $sm->skor_rally + $sm->skor_pretest }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($sm->dasprog_a != null)
                                                                            <!-- <a href="/storage/{{ $sm->dasprog_a }}" class="badge badge-secondary badge-md" target="_blank">Dasprog A</a> -->
                                                                            <a href="/semifinal/dasprogA/{{ $sm->id }}"
                                                                                class="badge badge-secondary badge-md"
                                                                                target="_blank">Dasprog A</a>
                                                                        @endif
                                                                        @if ($sm->dasprog_b != null)
                                                                            <!-- <a href="/storage/{{ $sm->dasprog_b }}" class="badge badge-secondary badge-md" target="_blank">Dasprog B</a> -->
                                                                            <a href="/semifinal/dasprogB/{{ $sm->id }}"
                                                                                class="badge badge-secondary badge-md"
                                                                                target="_blank">Dasprog B</a>
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

    @endsection
