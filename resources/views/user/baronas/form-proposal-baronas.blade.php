@extends('user/template/user-template') @section('title', 'Pendaftaran Proposal Baronas | Evolution 2023') @section('container')

<!-- Header -->
<div class="header bg-default pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a><i class="fas fa-home" style="color: #172B4D"></i></a></li>
                            <li class="breadcrumb-item"><a style="color: #172B4D">Pendaftaran Proposal</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <p>{{ $error }}</p>
                </div>
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-12" style="width: 100%;">
            <div class="card" style="width: 100%;">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @else
                    <img src="/assets/img/homepage/logoBaronas.png" class="card-img-top p-3 logo-baronas"
                        alt="Logo Baronas">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Pendaftaran Proposal Paper Baronas</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.uploadKaryaTulis') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama_tim" class="form-control-label">
                                                    Nama Tim
                                                </label>
                                                <input type="text" name="nama_tim" id="nama_tim"
                                                    placeholder="Nama Tim" class="form-control"
                                                    {{ isset($curr_user_data->nama_tim) ? 'readOnly' : '' }}
                                                    value="{{ $curr_user_data->nama_tim }}" />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_ketua" class="form-control-label">
                                                    Nama Ketua
                                                </label>
                                                <input type="text" name="nama_ketua" id="nama_ketua"
                                                    placeholder="Nama Tim" class="form-control"
                                                    value="{{ $curr_user_data->nama_ketua }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_anggota_1" class="form-control-label">
                                                    Nama Anggota 1
                                                </label>
                                                <input type="text" name="nama_anggota_1" id="nama_anggota_1"
                                                    placeholder="Nama Tim" class="form-control"
                                                    value="{{ $curr_user_data->nama_anggota_1 }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_anggota_2" class="form-control-label">
                                                    Nama Anggota 2
                                                </label>
                                                <input type="text" name="nama_anggota_2" id="nama_anggota_2"
                                                    placeholder="Nama Tim" class="form-control"
                                                    value="{{ $curr_user_data->nama_anggota_2 }}" readonly />
                                            </div>
                                            <div class="form-group">
                                                <small>*Pastikan nomor dapat dihubungi</small>
                                                <label for="no_hp" class="form-control-label">
                                                    Nomor Hp
                                                </label>
                                                <input type="text" name="no_hp" id="no_hp"
                                                    placeholder="Nomor Hp" class="form-control"
                                                    value="{{ $curr_user_data->no_hp }}" readonly />
                                            </div>
                                            <div>
                                                <label for="email" class="form-control-label">
                                                    email ketua
                                                </label>
                                                <input type="email" name="email" id="email" placeholder="email"
                                                    class="form-control" value="{{ $curr_user_data->email }}"
                                                    readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="judul" class="form-control-label">
                                                    Judul Proposal
                                                </label>
                                                <input type="text" name="judul" id="judul" placeholder="Judul"
                                                    class="form-control" value="{{ $curr_user_data->judul }}"
                                                    readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="subtema" class="form-control-label">
                                                    Sub Tema
                                                </label>
                                                <input type="text" name="subtema" id="subtema"
                                                    placeholder="Sub Tema" class="form-control"
                                                    value="{{ $curr_user_data->subtema }}" readonly />
                                            </div>

                                            <div class="form-group">
                                                <label for="file_karya_tulis" class="form-control-label">
                                                    Upload File Karya Tulis
                                                </label>
                                                <input type="file" name="file_karya_tulis" id="file_karya_tulis"
                                                    class="form-control" accept=".pdf"
                                                    {{ isset($curr_user_data->file_karya_tulis) ? 'readOnly' : '' }} />
                                                <small>Only accepts .pdf and max 1 MB</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="link_yt" class="form-control-label">
                                                    Upload link yt
                                                </label>
                                                <input type="url" name="link_yt" id="link_yt"
                                                    placeholder="link yt" class="form-control"
                                                    {{ isset($curr_user_data->link_yt) ? 'readOnly' : '' }}
                                                    value="{{ $curr_user_data->link_yt }}" />
                                                <small>Ex: https://youtube.com/xxxxxxxx</small>
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
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
