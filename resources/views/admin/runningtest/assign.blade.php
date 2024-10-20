@extends('admin.template.admin-template')

@section('title', 'Assign Kelompok Baronas')

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
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Assign Kelompok Baronas
                                        {{ $kategori }}</a></li>
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
                <form action="{{ route('visit-baronas.assign.kelompok.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $running_data->id }}">
                    <div class="form-group">
                        <label for="baronas_id">Nama Tim</label>
                        <input type="disabled" value="{{ $running_data->baronas->nama_tim }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Masukkan Kelompok untuk Kategori {{ $kategori }}</label>
                        <select name="kelompokid" id="" class="form-control">
                            <option value="">Pilih Kelompok</option>
                            @foreach ($kelompok as $kel)
                                <option value="{{ $kel->id }}">{{ $kel->kelompok }} - {{ $kel->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
