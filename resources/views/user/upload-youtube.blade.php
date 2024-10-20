@extends('user/template/user-template')

@section('title', 'Pendaftaran Evolve | Evolution 2023')

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
                                <li class="breadcrumb-item"><a style="color: #172B4D">Pendaftaran</a></li>
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
                    <!-- <img src="/img/brand/TEXT_Evolve.png" class="card-img-top p-2" alt="Logo Evolve" style="width: 50%; margin: 0 auto;"> -->
                    <img src="/assets/img/homepage/logoEvolve.png" class="card-img-top p-3 logo-baronas" alt="Logo Evolve">
                    <div class="card-body">
                        <!-- <h5 class="card-title" style="font-size: xx-large; text-align: center;">
                                <img src="/img/brand/TEXT_Evolve.png" alt="">
                            </h5> -->

                        <div class="row">
                            <div class="col">

                                @if ($evolve['pembayaran_status'] == 0 && $evolve['email'] != null)
                                    {{-- <div class="alert alert-success alert-block">
                                        Data pendaftaran telah tersimpan. Silahkan lakukan pembayaran pada menu pembayaran
                                    </div> --}}
                                    {{-- @if ($evolve['is_verified'] == 0)
                                    <div class="alert alert-success alert-block">
                                        Email verifikasi telah dikirimkan, jika tidak ada, dapat klik  
                                        <a
                                        href="{{ url('/user/daftar/evolve/resend') }}">Link ini
                                    </a>
                                    </div>
                                    @endif

                                    @if ($evolve['is_verified'] == 1)
                                    <div class="alert alert-success alert-block">
                                        Akun anda telah diverifikasi! Silahkan lakukan pembayaran. 
                                    </div>
                                    @endif --}}
                                    {{-- <div class="alert alert-success alert-block">
                                        Lakukan Pembayaran Terlebih dahulu 
                                    </div> --}}


                                @endif

                                {{-- @if ($evolve['pembayaran_status'] == 1 )
                                    <div class="alert alert-success alert-block">
                                        Pembayaran sedang kami proses
                                    </div>
                                @endif --}}

                                @if ($evolve['link_youtube'] != NULL)
                                    <div class="alert alert-success alert-block">
                                        Terima Kasih telah mengupload Video
                                    </div>
                                @endif

                                @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger">
                                        {{ $notification }}
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="heading text-muted mb-4">Upload Video Youtube</h6>
                                        <form method="POST" enctype="multipart/form-data"
                                            action="{{ route('user.uploadVideo') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label class="form-control-label" for="input-name">Link Youtube</label>
                                                <input name="link_youtube" type="text" id="link_youtube" class="form-control"
                                                    placeholder="Link Youtube" value="{{ $evolve->link_youtube }}"
                                                    {{-- {{ $evolve['pembayaran_status'] == 2 ? '' : 'disabled' }} required> --}}
                                                    {{ ($evolve['nama'] != NULL) && ($evolve['link_youtube'] == NULL) ? '' : 'disabled' }} required>
                                            </div>
                                           

                                            <!-- Button trigger modal -->
                                            <!-- <button data-target="#daftarevolve" type="submit" value="daftar" class="btn btn-md" style="color: white ;width: 100%; background-color: #1a174d">
                                                    Daftar
                                                </button> -->

                                            <button type="button" class="btn btn-md" data-toggle="modal"
                                                data-target="#submitVideo"
                                                style="color: white; width: 100%; background-color: #1a174d"
                                                {{ ($evolve['nama'] != NULL) && ($evolve['link_youtube'] == NULL) ? '' : 'disabled' }}>Submit</button>

                                            <div class="modal fade" id="submitVideo" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="mt-3">Link sudah benar ?</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button data-target="#uploadvideo" type="submit"
                                                                value="submit" class="btn btn-md"
                                                                style="color: white; background-color: #1a174d">Kirim</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4" />
                                        </form>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endsection
