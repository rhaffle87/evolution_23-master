@extends('admin/template/admin-template')

@section('title', 'List Users | Evolution 2023')

@section('container')
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fas fa-home"
                                            style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a href="/admin/lihat-semua-data-akun"
                                        style="color: #172B4D">Daftar
                                        Users</a></li>
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
                    <div class="card-body">
                        {{-- make a search bar --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <form action="/admin/all-users/search" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari user"
                                            aria-label="Recipient's username" aria-describedby="button-addon2"
                                            name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="button-addon2">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Email</th>
                                                        <th>Status verifikasi</th>
                                                        <th>Role</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($datas as $data)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data->email }}</td>
                                                            @if ($data->register_status == 1)
                                                                <td style="color: green">Verified</td>
                                                            @else
                                                                <td style="color: red">Not Verified</td>
                                                            @endif
                                                            @if ($data->level == 1)
                                                                <td>Admin</td>
                                                            @elseif ($data->level == 0)
                                                                <td>User</td>
                                                            @endif
                                                            <td>
                                                                <form action="/admin/all-users/{{ $data->id }}/delete"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Hapus</button>
                                                                </form>
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
