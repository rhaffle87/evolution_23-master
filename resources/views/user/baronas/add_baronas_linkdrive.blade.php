@extends('user/template/user-template')

@section('title', 'Add Baronas Running Test Link | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a style="color: #172B4D">Tambahkan Drive Baronas</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>



    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12" style="width: 100%;">
                <div class="card" style="width: 100%;">
                    <img src="/assets/img/homepage/logoBaronas.png" class="card-img-top p-3 logo-baronas"
                        alt="Logo Baronas">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Paper Baronas</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.addLinkDrive') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="link_drive" class="form-control-label">
                                                    Link Drive
                                                </label>
                                                <input type="text" name="link_drive" id="link_drive"
                                                    placeholder="Nama Tim" class="form-control" />
                                            </div>


                                            <button type="submit" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitPendaftaran"
                                                style="color: white; width: 100%; background-color: #1a174d">Submit</button>
                                        </form>

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
