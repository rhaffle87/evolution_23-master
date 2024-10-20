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
                    <h1 class="display-2 text-white mb-5" style="font-size: 50px">PERMINTAAN FITUR</h1>
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
                        <h1 class="mb-0">Form:</h1>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <div class="media-body p-4">
                                <span class="name mb-0 text-sm" style="text-align: justify;">
                                    <form action="{{ route('admin.sendFeatureReq') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-control-label">Nama Pengaju</label>
                                            <input type="text" name="nama_pengaju" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor" class="form-control-label">No WA</label>
                                            <input type="text" name="nomor" class="form-control">
                                            <small>Pakai format 628xxxxx (tidak perlu pakai +)</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_divisi" class="form-control-label">Sub Divsi</label>
                                            <select name="sub_divisi" id="" class="form-control">
                                                <option value="Electra">Electra</option>
                                                <option value="Baronas">Baronas</option>
                                                <option value="Evolve">Evolve</option>
                                                <option value="-------" selected disabled>-------</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="permintaan" class="form-control-label">Isi Fitur (Buat list pakai
                                                '-')</label>
                                            <textarea class="form-control" name="permintaan" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar" class="form-control-label">Gambar</label>
                                            <input type="file" name="gambar" class="form-control" accept="image/*">
                                            <small>Opsional</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="video" class="form-control-label">Video</label>
                                            <input type="file" name="video" class="form-control" accept="video/*">
                                            <small>Opsional</small>
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

        <div class="row">
            <div class="col">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Divisi</th>
                                        <th>Fitur Yang Diajukan</th>
                                        <th>Foto</th>
                                        <th>Video</th>
                                        <th>Status Develop</th>
                                        <th>Status Review</th>
                                        <th>Status Final</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_pengaju }}</td>
                                            <td>{{ $data->sub_divisi }}</td>
                                            <td>
                                                <?php
                                                // when found a "-" create a new line
                                                $str = $data->permintaan;
                                                $str = str_replace('-', '<br>-', $str);
                                                echo $str;
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                                                    data-target="#ShowData" onclick="ShowData('{{ $data->gambar }}');">
                                                    Lihat
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                                                    data-target="#ShowDataVideo"
                                                    onclick="ShowVideoData('{{ $data->video }}');">
                                                    Lihat
                                                </button>
                                            </td>
                                            </td>
                                            @if ($data->status_develop == 1)
                                                <td style="color: green">SUDAH</td>
                                            @else
                                                <td style="color: red">BELUM</td>
                                            @endif

                                            @if ($data->status_review == 1)
                                                <td style="color: green">SUDAH</td>
                                            @else
                                                <td style="color: red">BELUM</td>
                                            @endif

                                            @if ($data->status_selesai == 1)
                                                <td style="color: green">SUDAH</td>
                                            @else
                                                <td style="color: red">BELUM</td>
                                            @endif

                                            <td>
                                                <form action="/admin/news/minta-tambah-fitur/send/sudah-develop"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <button type="submit" class="btn btn-primary btn-md">Sudah
                                                        Develop</button>
                                                </form>
                                                <br>
                                                <form action="/admin/news/minta-tambah-fitur/send/sudah-review"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <button type="submit" class="btn btn-primary btn-md">Sudah
                                                        Review</button>
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

        <div class="modal fade" id="ShowData" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Lihat Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <img id="asset" style="width:100%;" src="">
                </div>
            </div>
        </div>

        <div class="modal fade" id="ShowDataVideo" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Lihat Data Peserta</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <video id="asset-video" style="width:100%;" src="">
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function ShowData(mSrc) {
                document.getElementById("asset").src = "{{ asset('/storage/') }}/" + mSrc;
            }

            function ShowVideoData(mSrc) {
                document.getElementById("asset-video").src = "{{ asset('/storage/') }}/" + mSrc;
            }
        </script>

    @endsection
