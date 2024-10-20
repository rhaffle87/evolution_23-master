@extends('admin.template.admin-template')



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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Daftar Peserta
                                        Electra</a></li>
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
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

    <script>
        function updateBaronasId(id, value) {
            var name = value;
            var pertandingan = $('#baronas-id option:selected').data('pertandingan');
            if (pertandingan == 1)
                var status = "Sedang Bertanding";
            else if (pertandingan == 2)
                var status = "Akan Bertanding";
            else
                var status = "Menunggu Giliran";
            var pesan = "Anda akan mengubah data " + name + " menjadi " + status;
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: pesan,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('meeting-room.update', ':id') }}".replace(':id', id),
                        type: "POST",
                        data: {
                            nama_tim: name,
                            break_out_room_id: id,
                            status: pertandingan,
                            _method: "PUT",
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            var data = JSON.stringify(response.message);
                            console.log(data);
                            Swal.fire({
                                title: 'Berhasil!',
                                text: response.message,
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 1500
                            }).then((result) => {
                                // location.reload();
                            })
                        },
                        error: function(response) {
                            var data = JSON.parse(response.responseText);
                            console.log(data.message);
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message,
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 15000
                            }).then((result) => {
                                location.reload();
                            })
                        }
                    });
                }
            })
            // get the select from id baronas-id and get the value
        }
    </script>
@endpush

@push('styles')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
