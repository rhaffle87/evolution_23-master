@extends('/user/template/user-template-semifinal')

@section('title', 'Terima Kasih Semifinal Electra | Evolution 2021')

@section('container')

<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(/img/theme/hero.jpeg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-10">
                <h1 class="display-2 text-white mb-5" style="font-size: 50px; text-align: center">TELAH BERAKHIR SEMUA SESI SEMIFINAL ELECTRA 2021</h1>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Tab Electra  -->
                <div class="tab-pane active" id="tabElectra" role="tabpanel">
                    <div class="card pengumuman">

                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center ">
                                <div class="media-body p-4">

                                    <div class="alert alert-default" role="alert" style="text-align: center">
                                        <!-- 60.000 + 100 + 2 least unique ID -->
                                        <h1 style="color: white;">Terima Kasih Sudah Berpartisipasi</h1>
                                        <p style="text-align: center;">Silahkan kembali ke halaman utama</p>

                                        <br>
                                        <a href="/user/dashboard">
                                            <button type="submit" value="daftar" class="btn btn-md col-5 col-lg-2 mt--3" style="color: white; background-color: #707CAA">
                                                Dashboard
                                            </button>
                                        </a>


                                    </div>

                                </div>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection