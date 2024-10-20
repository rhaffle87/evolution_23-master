@extends('admin/template/admin-template')

@section('title', 'Penyisihan Baronas SD Admin | Evolution 2023')

@section('container')
    <div class="container-fluid" style="margin-bottom: 20px; background-color: white">
        <div class="row">
            <div class="column" style="width: 100%; padding: 20px; background-color: white">
                <h6 class="heading text-muted mb-4" style="text-align: center; display: block">Tabel Pertandingan Penyisihan
                    Baronas SD</h6>
                <div id="message">
                    <div class="table-responsive">
                        {{ csrf_field() }}
                        <table class="table table-bordered" width="" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Tim</th>
                                    <th>Skor</th>
                                    <th>Waktu</th>
                                    <th>Jumlah Bertanding</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column" style="margin: auto;">
                <h6 class="heading text-muted mb-4">Jadwal Penyisihan Baronas SD</h6>
            </div>
        </div>
        <div class="row">
            <div class="column" style="width: 30%; padding: 20px; margin:auto">
                <h6 class="heading text-muted mb-4" style="margin-top: 20px;">Room 1</h6>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.penyisihanBaronasSdRoom1') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Bertanding</label>
                        <input type="text" id="waktu-tanding-room1" name="waktu_tanding_room1" class="form-control"
                            placeholder="Masukkan Waktu Bertanding" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Menuggu</label>
                        <input type="text" id="waktu-tunggu-room1" name="waktu_tunggu_room1" class="form-control"
                            placeholder="Masukkan Waktu Menunggu Pertandingan" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bertanding</label>
                        <input type="text" id="tim-A-room1" name="tim_A_room1" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bersiap</label>
                        <input type="text" id="tim_B_room1" name="tim_B_room1" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Menunggu</label>
                        <input type="text" id="tim_C_room1" name="tim_C_room1" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <button type="submit" class="btn btn-md"
                        style="color: white; width: 100%; background-color: #1a174d">Tambahkan</button>
                </form>
            </div>
            <div class="column" style="width: 30%; padding: 20px; background-color: white; margin:auto">
                <h6 class="heading text-muted mb-4" style="margin-top: 20px;">Room 2</h6>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.penyisihanBaronasSdRoom2') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Bertanding</label>
                        <input type="text" id="waktu-tanding-room2" name="waktu_tanding_room2" class="form-control"
                            placeholder="Masukkan Waktu Bertanding" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Menuggu</label>
                        <input type="text" id="waktu-tunggu-room2" name="waktu_tunggu_room2" class="form-control"
                            placeholder="Masukkan Waktu Menunggu Pertandingan" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bertanding</label>
                        <input type="text" id="tim-A-room2" name="tim_A_room2" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bersiap</label>
                        <input type="text" id="tim-B-room2" name="tim_B_room2" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Menunggu</label>
                        <input type="text" id="tim-C-room2" name="tim_C_room2" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <button type="submit" class="btn btn-md"
                        style="color: white; width: 100%; background-color: #1a174d">Tambahkan</button>
                </form>
            </div>
            <div class="column" style="width: 30%; padding: 20px; background-color: white; margin:auto">
                <h6 class="heading text-muted mb-4" style="margin-top: 20px;">Room 3</h6>
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.penyisihanBaronasSdRoom3') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Bertanding</label>
                        <input type="text" id="waktu-tanding-room3" name="waktu_tanding_room3" class="form-control"
                            placeholder="Masukkan Waktu Bertanding" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Waktu Menuggu</label>
                        <input type="text" id="waktu-tunggu-room3" name="waktu_tunggu_room3" class="form-control"
                            placeholder="Masukkan Waktu Menunggu Pertandingan" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bertanding</label>
                        <input type="text" id="tim-A-room3" name="tim_A_room3" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Bersiap</label>
                        <input type="text" id="tim-B-room3" name="tim_B_room3" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-name">Tim Menunggu</label>
                        <input type="text" id="tim-C-room3" name="tim_C_room3" class="form-control"
                            placeholder="Masukkan Nama Tim" value="" required>
                    </div>
                    <button type="submit" class="btn btn-md"
                        style="color: white; width: 100%; background-color: #1a174d">Tambahkan</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="column" style="width: 30%; margin: auto;">
                @if ($roomsatu != '')
                    <div class="card" style="border: 1px solid;">
                        <div class="row" style="padding: 10px;">
                            <div class="column" style="width: 50%;">
                                <span style="text-align: center; display:block;">Status</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Bertanding</span>
                                <div id="waktuTanding1"></div>
                                <span style="text-align: center; display:block; padding: 20px;">Persiapan</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Menunggu
                                    giliran</span>
                                <div id="waktuTunggu1"> </div>
                            </div>
                            <div class="column" style="width: 50%;">
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timTanding1"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timBersiap1"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timTunggu1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="column" style="width: 30%; margin: auto;">
                @if ($roomdua != '')
                    <div class="card" style="border: 1px solid;">
                        <div class="row" style="padding: 10px;">
                            <div class="column" style="width: 50%;">
                                <span style="text-align: center; display:block;">Status</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Bertanding</span>
                                <div id="waktuTanding2"></div>
                                <span style="text-align: center; display:block; padding: 20px;">Persiapan</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Menunggu
                                    giliran</span>
                                <div id="waktuTunggu2"></div>
                            </div>
                            <div class="column" style="width: 50%;">
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timTanding2"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timBersiap2"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%; border: 1px solid; border-radius: 5px;">
                                    <div id="timTunggu2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="column" style="width: 30%; margin: auto;">
                @if ($roomtiga != '')
                    <div class="card" style="border: 1px solid;">
                        <div class="row" style="padding: 10px;">
                            <div class="column" style="width: 50%;">
                                <span style="text-align: center; display:block;">Status</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Bertanding</span>
                                <div id="waktuTanding3"></div>
                                <span style="text-align: center; display:block; padding: 20px;">Persiapan</span>
                                <span style="text-align: center; display:block; padding: 20px 0 0 10px;">Menunggu
                                    giliran</span>
                                <div id="waktuTunggu3"></div>
                            </div>
                            <div class="column" style="width: 50%;">
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%;; border: 1px solid; border-radius: 5px;">
                                    <div id="timTanding3"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%;; border: 1px solid; border-radius: 5px;">
                                    <div id="timBersiap3"></div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 18%;; border: 1px solid; border-radius: 5px;">
                                    <div id="timTunggu3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {

            fetch_data();
            fetch_schedule1();
            fetch_schedule2();
            fetch_schedule3();

            function fetch_data() {
                $.ajax({
                    url: "/admin/penyisihan/baronas/sd/fetch-data",
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        html += '<tr>';
                        html += '<td></td>';
                        html += '<td contenteditable id="nama_tim"></td>';
                        html += '<td contenteditable id="skor"></td>';
                        html += '<td contenteditable id="waktu"></td>';
                        html += '<td contenteditable id="jumlah_tanding"></td>';
                        html +=
                            '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
                        for (var count = 0; count < data.length; count++) {
                            var number = count + 1;
                            html += '<tr>';
                            html += '<td>' + number + '</td>';
                            html +=
                                '<td contenteditable class="column_name" data-column_name="nama_tim" data-id="' +
                                data[count].id + '">' + data[count].nama_tim + '</td>';
                            html +=
                                '<td contenteditable class="column_name" data-column_name="skor" data-id="' +
                                data[count].id + '">' + data[count].skor + '</td>';
                            html +=
                                '<td contenteditable class="column_name" data-column_name="waktu" data-id="' +
                                data[count].id + '">' + data[count].waktu + '</td>';
                            html +=
                                '<td contenteditable class="column_name" data-column_name="jumlah_tanding" data-id="' +
                                data[count].id + '">' + data[count].jumlah_tanding + '</td>';
                            html +=
                                '<td><button type="button" class="btn btn-danger btn-xs delete" id="' +
                                data[count].id + '">Delete</button></td></tr>';
                        }
                        $('tbody').html(html);
                    }
                });
            }

            function fetch_schedule1() {
                $.ajax({
                    url: "/admin/penyisihan/baronas/sd/fetch-schedule1",
                    dataType: "json",
                    success: function(schedule) {
                        var waktu_tanding = '';
                        var waktu_tunggu = '';
                        var tim_tanding = '';
                        var tim_bersiap = '';
                        var tim_tunggu = '';
                        waktu_tanding +=
                            '<span contenteditable class="column_schedule1" data-column_schedule="waktu_tanding" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding: 0 20px 20px 20px;">' +
                            schedule.waktu_tanding + '</span>';
                        waktu_tunggu +=
                            '<span contenteditable class="column_schedule1" data-column_schedule="waktu_tunggu" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding-bottom: 20px;">' +
                            schedule.waktu_tunggu + '</span>';
                        tim_tanding +=
                            '<div contenteditable class="column column_schedule1" data-column_schedule="tim_a" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_a + '</div>';
                        tim_bersiap +=
                            '<div contenteditable class="column column_schedule1" data-column_schedule="tim_b" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_b + '</div>';
                        tim_tunggu +=
                            '<div contenteditable class="column column_schedule1" data-column_schedule="tim_c" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_c + '</div>';
                        $('#waktuTanding1').html(waktu_tanding);
                        $('#waktuTunggu1').html(waktu_tunggu);
                        $('#timTanding1').html(tim_tanding);
                        $('#timBersiap1').html(tim_bersiap);
                        $('#timTunggu1').html(tim_tunggu);
                    }
                });
            }

            function fetch_schedule2() {
                $.ajax({
                    url: "/admin/penyisihan/baronas/sd/fetch-schedule2",
                    dataType: "json",
                    success: function(schedule) {
                        var waktu_tanding = '';
                        var waktu_tunggu = '';
                        var tim_tanding = '';
                        var tim_bersiap = '';
                        var tim_tunggu = '';
                        waktu_tanding +=
                            '<span contenteditable class="column_schedule2" data-column_schedule="waktu_tanding" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding: 0 20px 20px 20px;">' +
                            schedule.waktu_tanding + '</span>';
                        waktu_tunggu +=
                            '<span contenteditable class="column_schedule2" data-column_schedule="waktu_tunggu" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding-bottom: 20px;">' +
                            schedule.waktu_tunggu + '</span>';
                        tim_tanding +=
                            '<div contenteditable class="column column_schedule2" data-column_schedule="tim_a" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_a + '</div>';
                        tim_bersiap +=
                            '<div contenteditable class="column column_schedule2" data-column_schedule="tim_b" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_b + '</div>';
                        tim_tunggu +=
                            '<div contenteditable class="column column_schedule2" data-column_schedule="tim_c" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_c + '</div>';
                        $('#waktuTanding2').html(waktu_tanding);
                        $('#waktuTunggu2').html(waktu_tunggu);
                        $('#timTanding2').html(tim_tanding);
                        $('#timBersiap2').html(tim_bersiap);
                        $('#timTunggu2').html(tim_tunggu);
                    }
                });
            }

            function fetch_schedule3() {
                $.ajax({
                    url: "/admin/penyisihan/baronas/sd/fetch-schedule3",
                    dataType: "json",
                    success: function(schedule) {
                        var waktu_tanding = '';
                        var waktu_tunggu = '';
                        var tim_tanding = '';
                        var tim_bersiap = '';
                        var tim_tunggu = '';
                        waktu_tanding +=
                            '<span contenteditable class="column_schedule3" data-column_schedule="waktu_tanding" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding: 0 20px 20px 20px;">' +
                            schedule.waktu_tanding + '</span>';
                        waktu_tunggu +=
                            '<span contenteditable class="column_schedule3" data-column_schedule="waktu_tunggu" data-id="' +
                            schedule.id +
                            '" style="text-align: center; display:block; padding-bottom: 20px;">' +
                            schedule.waktu_tunggu + '</span>';
                        tim_tanding +=
                            '<div contenteditable class="column column_schedule3" data-column_schedule="tim_a" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_a + '</div>';
                        tim_bersiap +=
                            '<div contenteditable class="column column_schedule3" data-column_schedule="tim_b" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_b + '</div>';
                        tim_tunggu +=
                            '<div contenteditable class="column column_schedule3" data-column_schedule="tim_c" data-id="' +
                            schedule.id + '" style="margin: auto">' + schedule.tim_c + '</div>';
                        $('#waktuTanding3').html(waktu_tanding);
                        $('#waktuTunggu3').html(waktu_tunggu);
                        $('#timTanding3').html(tim_tanding);
                        $('#timBersiap3').html(tim_bersiap);
                        $('#timTunggu3').html(tim_tunggu);
                    }
                });
            }

            var _token = $('input[name="_token"]').val();

            $(document).on('click', '#add', function() {
                var nama_tim = $('#nama_tim').text();
                var skor = $('#skor').text();
                var waktu = $('#waktu').text();
                var jumlah_tanding = $('#jumlah_tanding').text();
                if (nama_tim != '' && skor != '' && waktu != '' && jumlah_tanding != '') {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdAddData') }}",
                        method: "POST",
                        data: {
                            nama_tim: nama_tim,
                            skor: skor,
                            waktu: waktu,
                            jumlah_tanding: jumlah_tanding,
                            _token: _token
                        },
                        success: function(data) {
                            $('#message').html(data);
                            fetch_data();
                        }
                    });
                } else {
                    $('#message').html("<div class='alert alert-danger'>Jangan Ada yang dikosongi</div>");
                }
            });

            $(document).on('blur', '.column_name', function() {
                var column_name = $(this).data("column_name");
                var column_value = $(this).text();
                var id = $(this).data("id");

                if (column_value != '') {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdUpdateData') }}",
                        method: "POST",
                        data: {
                            column_name: column_name,
                            column_value: column_value,
                            id: id,
                            _token: _token
                        },
                    })
                } else {
                    $('#message').html("<div class='alert alert-danger'>Ulangi Edit Data</div>");
                }
            });

            $(document).on('blur', '.column_schedule1', function() {
                var column_schedule = $(this).data("column_schedule");
                var column_schedule_value = $(this).text();
                var id = $(this).data("id");

                if (column_schedule_value != '') {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdUpdateSchedule1') }}",
                        method: "POST",
                        data: {
                            column_schedule: column_schedule,
                            column_schedule_value: column_schedule_value,
                            id: id,
                            _token: _token
                        },
                    })
                } else {
                    $('#message').html("<div class='alert alert-danger'>Ulangi Edit Jadwal</div>");
                }
            });

            $(document).on('blur', '.column_schedule2', function() {
                var column_schedule = $(this).data("column_schedule");
                var column_schedule_value = $(this).text();
                var id = $(this).data("id");

                if (column_schedule_value != '') {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdUpdateSchedule2') }}",
                        method: "POST",
                        data: {
                            column_schedule: column_schedule,
                            column_schedule_value: column_schedule_value,
                            id: id,
                            _token: _token
                        },
                    })
                } else {
                    $('#message').html("<div class='alert alert-danger'>Ulangi Edit Jadwal</div>");
                }
            });

            $(document).on('blur', '.column_schedule3', function() {
                var column_schedule = $(this).data("column_schedule");
                var column_schedule_value = $(this).text();
                var id = $(this).data("id");

                if (column_schedule_value != '') {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdUpdateSchedule3') }}",
                        method: "POST",
                        data: {
                            column_schedule: column_schedule,
                            column_schedule_value: column_schedule_value,
                            id: id,
                            _token: _token
                        },
                    })
                } else {
                    $('#message').html("<div class='alert alert-danger'>Ulangi Edit Jadwal</div>");
                }
            });

            $(document).on('click', '.delete', function() {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to delete this records?")) {
                    $.ajax({
                        url: "{{ route('admin.penyisihanBaronasSdDeleteData') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            $('#message').html(data);
                            fetch_data();
                        }
                    });
                }
            });
        });
    </script>
@endsection
