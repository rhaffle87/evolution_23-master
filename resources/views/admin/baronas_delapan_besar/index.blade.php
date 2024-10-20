@extends('admin.template.admin-template')

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
                showConfirmButton: true,
            })
        </script>
    @endif
    @if ($notification = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ $notification }}',
                showConfirmButton: true,
            })
        </script>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('submit.delapan.besar') }}" method="POST">
                    @csrf
                    <div class="row
                    justify-content-between d-flex">
                        <div class="col form-group">
                            <label for="team1">Team 1</label>
                            <input type="text" name="team1" list="baronas_teams1" class="form-control">
                            <datalist id="baronas_teams1">
                                @foreach ($baronas_teams as $team)
                                    <option value="{{ $team->baronas->nama_tim }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col form-group">
                            <label for="team2">Team 2</label>
                            <input type="text" name="team2" list="baronas_teams2" class="form-control">
                            <datalist id="baronas_teams2">
                                @foreach ($baronas_teams as $team)
                                    <option value="{{ $team->baronas->nama_tim }}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col form-group">
                            <label for="kelompok">Kelompok *angka</label>
                            <input type="number" name="kelompok" class="form-control">
                        </div>
                        <div class="col form-group">
                            <label for="giliran">Giliran</label>
                            <input type="number" name="giliran" class="form-control">
                        </div>
                        <div class="col form-group text-center justify-content-center align-items-center py-auto">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>

                <hr>

                <h3>8 Besar</h3>

                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama tim</th>
                            <th>Kategori</th>
                            <th>Grade</th>
                            <th>Runtime</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baronas_delapan_besar as $delapan_besar)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $delapan_besar->baronas->nama_tim }}</td>
                                <td>{{ $delapan_besar->baronas->kategori }}</td>
                                <td>{{ $delapan_besar->grade }}</td>
                                <td>{{ $delapan_besar->runtime }}</td>
                                <td>
                                    {{-- input the grade and runtime and do onkeyup execute submitGrade and submitRuntime function --}}
                                    <input type="hidden" name="baronas_id" value="{{ $delapan_besar->baronas_id }}"
                                        id="baronas_id">
                                    <input type="text" name="grade" class="form-control" placeholder="Grade"
                                        id="grade" onblur="submitGrade(this)" id="grade">
                                    <input type="text" name="runtime" class="form-control" placeholder="Runtime"
                                        id="runtime" onblur="submitRuntime(this)" id="runtime">
                                    <a href="{{ route('baronas.gagal-lolos-semifinal', $delapan_besar->id) }}"
                                        class="btn btn-danger btn-sm">Gagal Lolos Semifinal</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <hr>

                <h3>8 Besar Matches</h3>

                <table class="table table-bordered table-striped" id="table-match">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Result</th>
                            <th>Kelompok - Giliran</th>
                            <th>Status</th>
                            <th>Insert Winner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baronas_matches as $delapan_besar_match)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $delapan_besar_match->team1->baronas->kategori }}</td>
                                <td>{{ $delapan_besar_match->team1->baronas->nama_tim }}</td>
                                <td>{{ $delapan_besar_match->team2->baronas->nama_tim }}</td>
                                <?php
                                $baronas_name = '';
                                try {
                                    if ($delapan_besar_match->result == $delapan_besar_match->team1_id) {
                                        $baronas_name = $delapan_besar_match->team1->baronas->nama_tim;
                                    } elseif ($delapan_besar_match->result == $delapan_besar_match->team2_id) {
                                        $baronas_name = $delapan_besar_match->team2->baronas->nama_tim;
                                    } else {
                                        $baronas_name = 'Belum ada';
                                    }
                                } catch (Exception $e) {
                                    $baronas_name = 'Belum ada';
                                }
                                ?>
                                <td>{{ $baronas_name }}</td>
                                <td>Kelompok {{ $delapan_besar_match->kelompok }} - Giliran
                                    {{ $delapan_besar_match->giliran }} </td>
                                <td>
                                    <input type="hidden" name="match_id" value="{{ $delapan_besar_match->id }}"
                                        id="match_id">
                                    <select name="status" id="status" class="form-control"
                                        onchange="post8BesarStatus(this)">
                                        <option value="0" {{ $delapan_besar_match->status == 0 ? 'selected' : '' }}>
                                            Pilih status</option>
                                        <option value="1" {{ $delapan_besar_match->status == 1 ? 'selected' : '' }}>
                                            Sedang Bermain</option>
                                        <option value="2" {{ $delapan_besar_match->status == 2 ? 'selected' : '' }}>
                                            Persiapan</option>
                                        <option value="3" {{ $delapan_besar_match->status == 3 ? 'selected' : '' }}>
                                            Menunggu Giliran</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="match_id" value="{{ $delapan_besar_match->id }}"
                                        id="match_id">
                                    <input type="text" name="winner" list="baronas_teams_winner" class="form-control"
                                        onchange="post8BesarWinner(this)" id="winner">
                                    <datalist id="baronas_teams_winner">
                                        <option value="{{ $delapan_besar_match->team1->baronas->nama_tim }}">
                                        <option value="{{ $delapan_besar_match->team2->baronas->nama_tim }}">
                                    </datalist>
                                </td>
                                <td>
                                    <a href="{{ route('baronas.delapan.besar.match.destroy', $delapan_besar_match->id) }}"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
            $('#table-match').DataTable();
        });
    </script>

    <script>
        var _token = $('input[name="_token"]').val();

        function post8BesarWinner(input) {
            var result = input.value;
            var id = input.previousElementSibling.value;
            var _token = $('input[name="_token"]').val();
            console.log(result, id, _token);
            $.ajax({
                url: "{{ route('submit.winner.delapan.besar') }}",
                method: "POST",
                data: {
                    result: result,
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Winner has been submitted',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            });
        }

        function submitGrade(input) {
            var baronas_id = input.previousElementSibling.value;
            var grade = input.value;
            console.log(baronas_id, grade);
            //Route::post('/submit/baronas/delapan/besar/grade/{id}', [BaronasDelapanBesarController::class, 'submitGradeDelapanBesar'])->name('submit.grade.delapan.besar');
            $.ajax({
                url: "{{ route('submit.grade.delapan.besar', ';id') }}".replace(':id', baronas_id),
                method: "POST",
                data: {
                    grade: grade,
                    baronas_id: baronas_id,
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Grade has been submitted',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            });
        }

        function submitRuntime(input) {
            var baronas_id = input.previousElementSibling.previousElementSibling.value;
            var runtime = input.value
            console.log(baronas_id, runtime);
            $.ajax({
                url: "{{ route('submit.runtime.delapan.besar', ';id') }}".replace(':id', baronas_id),
                method: "POST",
                data: {
                    runtime: runtime,
                    baronas_id: baronas_id,
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Runtime has been submitted',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            });
        }

        function post8BesarStatus(input) {
            var status = input.value;
            var id = input.previousElementSibling.value;
            console.log(status, id, _token);
            $.ajax({
                url: "{{ route('baronas.delapan.besar.match.submit.status') }}",
                method: "POST",
                data: {
                    status: status,
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Status has been submitted',
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            });
        }
    </script>
@endpush
