@extends('admin/template/admin-template')

@section('title', 'List Baronas Admins | Evolution 2023')

@section('container')

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"
                                            style="color: #172B4D"></i></a></li>
                                <li class="breadcrumb-item"><a href="#" style="color: #172B4D">Daftar Peserta
                                        Baronas</a></li>
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
                    <!-- <img src="/img/brand/ELECTRA.png" class="card-img-top p-2" alt="Logo Electra" style="width: 50%; margin: 0 auto;"> -->
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: xx-large; text-align: left;">
                            <!-- <img src="/img/brand/TEXT_ELECTRA.png" alt=""> -->
                            <a href="{{ url('/admin/excel/baronas-paper') }}" class="">
                                <button class="btn btn-md bg-success" style="color: white;">Export <i
                                        class="fas fa-file-excel ml-2"></i></button>
                            </a>
                        </h5>

                        <div class="row">
                            <div class="col">
                                @if ($notification = Session::get('email-fail'))
                                    <div class="alert alert-danger alert-block">
                                        <strong>{{ $notification }}</strong>
                                    </div>
                                @endif

                                @if ($notification = Session::get('email-success'))
                                    <div class="alert alert-success alert-block">
                                        <strong>{{ $notification }}</strong>
                                    </div>
                                @endif

                                @if ($notification = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('failed'))
                                    <div class="alert alert-danger alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                @if ($notification = Session::get('success-update'))
                                    <div class="alert alert-success alert-block">
                                        {{ $notification }}
                                    </div>
                                @endif

                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Tim</th>
                                                        <th>Ketua </th>
                                                        <th>Asal Sekolah/Institusi</th>
                                                        <th>Judul</th>
                                                        <th>Subtema</th>
                                                        <th>KTP Ketua</th>
                                                        <th>KTP Anggota 1</th>
                                                        <th>KTP Anggota 2</th>
                                                        <th>Edit Data</th>
                                                        <th>File Paper</th>
                                                        <th>Link YT</th>
                                                        <th>File Karya Tulis</th>
                                                        <th>Bukti Bayar</th>
                                                        <th>Verifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list_baronas as $baronas)
                                                        <tr>
                                                            <td> {{ $baronas->nama_tim }} </td>
                                                            <td> {{ $baronas->nama_ketua }} </td>
                                                            <td> {{ $baronas->asal_sekolah }} </td>
                                                            <td> {{ $baronas->judul }} </td>
                                                            <td> {{ $baronas->subtema }} </td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $baronas->ktp_ketua) }}"
                                                                    target="_blank">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $baronas->ktp_anggota_1) }}"
                                                                    target="_blank">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $baronas->ktp_anggota_2) }}"
                                                                    target="_blank">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ url('/admin/edit/baronas/paper/' . $baronas->id) }}">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $baronas->file_paper) }}"
                                                                    target="_blank">
                                                                    <button class="btn btn-sm btn-primary">Lihat</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                @if ($baronas->link_yt == null)
                                                                    <button class="btn btn-sm btn-danger">Belum ada</button>
                                                                @else
                                                                    <a href="{{ $baronas->link_yt }}" target="_blank">
                                                                        <button
                                                                            class="btn btn-sm btn-primary">Lihat</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($baronas->file_karya_tulis == null)
                                                                    <button class="btn btn-sm btn-danger">Belum ada</button>
                                                                @else
                                                                    <a href="{{ asset('storage/' . $baronas->file_karya_tulis) }}"
                                                                        target="_blank">
                                                                        <button
                                                                            class="btn btn-sm btn-primary">Lihat</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($baronas->bukti_bayar == null)
                                                                    <button class="btn btn-sm btn-danger">Belum ada</button>
                                                                @else
                                                                    <a href="{{ asset('storage/' . $baronas->bukti_bayar) }}"
                                                                        target="_blank">
                                                                        <button
                                                                            class="btn btn-sm btn-primary">Lihat</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ url('/admin/verifikasi/baronas-paper/' . $baronas->id) }}">
                                                                    <button
                                                                        class="btn btn-sm btn-success">Verifikasi</button>
                                                                </a>
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


        <!-- Modal verifikasi offline -->
        <div class="modal fade" id="konfirmasiOffline" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Verifikasi peserta ?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="konfirmasiBtnFinalOffline" href="" type="button" class="btn btn-success">Verifikasi
                            !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <div class="modal fade" id="konfirmasi" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Verifikasi pembayaran peserta ?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="konfirmasiBtnFinal" href="" type="button" class="btn btn-success">Verifikasi
                            !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="hapus" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="mt-3">Hapus data peserta ?</h3>
                    </div>
                    <div class="modal-footer">
                        <a id="hapusBtnFinal" href="" type="button" class="btn btn-danger">Hapus !</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function konfirmasiModal(mHref, mSrc) {
                // alert(mSrc);
                // document.getElementById("gambarBuktiPembayaran").src = "{{ url('/storage/app') }}/" + mSrc;
                document.getElementById("konfirmasiBtnFinalOffline").href = "{{ url('/admin/list/baronas/konfirmasi') }}/" +
                    mHref;
                document.getElementById("konfirmasiBtnFinal").href = "{{ url('/admin/list/baronas/konfirmasi') }}/" + mHref;
            }

            function hapusModal(mHref) {
                document.getElementById("hapusBtnFinal").href = "{{ url('/admin/list/baronas/delete') }}/" + mHref;
            }

            // function editModal(mHref) {
            // document.getElementById("editBtnFinal").href = "{{ url('/admin/list/baronas/edit') }}/" + mHref;
            // }
        </script>

    @endsection
