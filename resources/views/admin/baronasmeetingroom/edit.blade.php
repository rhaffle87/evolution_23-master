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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Edit Data</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('visit-baronas.update', $running_data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="baronas_id">Nama Tim</label>
                        <input type="text" name="baronas_id" id="baronas_id" class="form-control"
                            value="{{ $running_data->baronas->nama_tim }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_running">Jumlah Running</label>
                        <input type="number" name="jumlah_running" id="jumlah_running" class="form-control"
                            value="{{ $running_data->jumlah_running }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_nilai">Jumlah Nilai</label>
                        <input type="number" name="jumlah_nilai" id="jumlah_nilai" class="form-control"
                            value="{{ $running_data->jumlah_nilai }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_waktu">Jumlah Waktu</label>
                        <input type="number" name="jumlah_waktu" id="jumlah_waktu" class="form-control"
                            value="{{ $running_data->jumlah_waktu }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
