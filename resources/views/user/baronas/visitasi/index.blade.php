@extends('user.template.user-template')

@section('title', 'Visitasi')

@push('styles')
    <script>
        // refresh page every 1 minute
        setTimeout(function() {
            location.reload();
        }, 60000);
    </script>
@endpush

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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Visitasi Robot</a></li>
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
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3 class="mb-0">Room {{ $i }}</h3>
                                </div>
                                <div class="card-body">
                                    @if ($i == 1)
                                        @php
                                            $room_1 = $room_1->sortBy('status');
                                        @endphp
                                        @foreach ($room_1 as $bo1)
                                            <div class="row">
                                                <div class="col-6">
                                                    @if ($bo1->status == 1)
                                                        <h4 class="mb-3">Sedang Bertanding</h4>
                                                    @elseif($bo1->status == 2)
                                                        <h4 class="mb-3">Akan Bertanding</h4>
                                                    @else
                                                        <h4 class="mb-3">Menunggu Giliran</h4>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <h4 class="mb-3"> : </h4>
                                                </div>
                                                <div class="col-4">
                                                    <h4 class="mb-3">{{ $bo1->baronas->nama_tim }}</h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif($i == 2)
                                        @php
                                            $room_2 = $room_2->sortBy('status');
                                        @endphp
                                        @foreach ($room_2 as $bo2)
                                            <div class="row">
                                                <div class="col-6">
                                                    @if ($bo2->status == 1)
                                                        <h4 class="mb-3">Sedang Bertanding</h4>
                                                    @elseif($bo2->status == 2)
                                                        <h4 class="mb-3">Akan Bertanding</h4>
                                                    @else
                                                        <h4 class="mb-3">Menunggu Giliran</h4>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <h4 class="mb-3"> : </h4>
                                                </div>
                                                <div class="col-4">
                                                    <h4 class="mb-3">{{ $bo2->baronas->nama_tim }}</h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @php
                                            $room_3 = $room_3->sortBy('status');
                                        @endphp
                                        @foreach ($room_3 as $bo3)
                                            <div class="row">
                                                <div class="col-6">
                                                    @if ($bo3->status == 1)
                                                        <h4 class="mb-3">Sedang Bertanding</h4>
                                                    @elseif($bo3->status == 2)
                                                        <h4 class="mb-3">Akan Bertanding</h4>
                                                    @else
                                                        <h4 class="mb-3">Menunggu Giliran</h4>
                                                    @endif
                                                </div>
                                                <div class="col-2">
                                                    <h4 class="mb-3"> : </h4>
                                                </div>
                                                <div class="col-4">
                                                    <h4 class="mb-3">{{ $bo3->baronas->nama_tim }}</h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        setInterval(function() {
            $('#runningtestbaronas-table').DataTable().ajax.reload();
        }, 5000);
    </script>
@endpush

@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
