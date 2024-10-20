@extends('admin/template/admin-template')

@section('title', 'Admin Panels | Evolution ITS')

@section('container')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center"
        style="min-height: 500px; background-image: url(/assets/img/bg-img/contact-bg.png); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-7"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col col-md-10">
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">PELAPORAN BUG KEPADA DIVISI WEBSITE</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h1 class="mb-0">Form pelaporan:</h1>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <div class="media-body p-4">
                                <span class="name mb-0 text-sm" style="text-align: justify;">
                                    <form action="{{ route('admin.sendBugReport') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="pelapor" class="form-control-label">Nama Pelapor</label>
                                            <input type="text" name="pelapor" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_bug" class="form-control-label">Jenis Bug</label>
                                            <select name="jenis_bug" id="" class="form-control">
                                                <option value="Electra">Electra</option>
                                                <option value="Baronas">Baronas</option>
                                                <option value="Evolve">Evolve</option>
                                                <option value="User">User</option>
                                                <option value="General">General</option>
                                                <option value="===-------===" selected disabled>===-------===</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi_bug" class="form-control-label">Isi Bug</label>
                                            <textarea class="form-control" name="isi_bug" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </span>
                            </div>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endsection
