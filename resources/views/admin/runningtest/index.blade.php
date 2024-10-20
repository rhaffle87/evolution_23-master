@extends('admin.template.admin-template')

@push('styles')
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="/vendor/datatables/buttons.server-side.js"></script>
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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Daftar Summary Running
                                        Test</a></li>
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
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('visit-baronas.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                        <a href="{{ url('admin/baronas/update/rank') }}" class="btn btn-success mb-3">Update Rank</a>
                    </div>
                </div>
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        async function deleteData($id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('visit-baronas.destroy', ':id') }}".replace(':id', $id),
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE"
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Data has been deleted.',
                                'success'
                            )
                            $('#runningtestbaronas-table').DataTable().ajax.reload();
                        },
                        error: function(response) {
                            var resp = JSON.parse(response);
                            console.log(resp);
                            Swal.fire(
                                'Error!',
                                'Something went wrong.' + response,
                                'error'
                            )
                        }
                    });
                }
            })
        }
    </script>
    {{ $dataTable->scripts() }}
@endpush
