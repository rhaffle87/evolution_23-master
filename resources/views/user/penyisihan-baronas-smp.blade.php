@extends('user/template/user-template')

@section('title', 'Live Penyisihan Baronas SMP | Evolution 2023')

@section('container')
    <div class="container-fluid" style="background-color: #f8f9fe;">
        <div class="row">
            <div class="column" style="margin: auto; padding-top: 40px;">
                <h6 class="heading mb-4" style="color: #04092b; font-size: larger">Tabel dan Jadwal Pertandingan Penyisihan
                    Baronas SMP</h6>
            </div>
        </div>
        <div class="row">
            <div class="column" style="width: 60%; padding: 2%;">
                <h6 class="heading mb-4" style="color: #04092b; font-weight: bold">Tabel Pertandingan</h6>
                <div class="table-responsive">
                    <table class="table table-bordered" width="" cellspacing="0">
                        <thead>
                            <tr style="background-color: #04092b; color: white">
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>Skor</th>
                                <th>Waktu</th>
                                <th>Jumlah Bertanding</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="column" style="width: 40%; padding: 2%; font-size: small;">
                <h7 class="heading mb-4" style="color: #04092b; font-weight: bold">Room 1</h6>
                    <div class="card"
                        style="border: 1.5px solid #04092b; margin-bottom: 3%; background-color: #29f870; color: #04092b">
                        <div class="row" style="padding: 2%;">
                            <div class="column" style="width: 50%;">
                                <span style="text-align: center; display:block;">Status</span>
                                <span style="text-align: center; display:block; padding: 2%;">Bertanding @if ($roomsatu != '')
                                        {{ $roomsatu->waktu_tanding }}
                                    @endif
                                </span>
                                <span style="text-align: center; display:block; padding: 2%;">Persiapan</span>
                                <span style="text-align: center; display:block; padding: 2% 0 0 1%;">Menunggu giliran</span>
                                <span style="text-align: center; display:block; padding-bottom: 20px;">
                                    @if ($roomsatu != '')
                                        {{ $roomsatu->waktu_tunggu }}
                                    @endif
                                </span>
                            </div>
                            <div class="column" style="width: 50%;">
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 12% 10% 4% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                    <div class="column" style="margin: auto">
                                        @if ($roomsatu != '')
                                            {{ $roomsatu->tim_a }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 4% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                    <div class="column" style="margin: auto">
                                        @if ($roomsatu != '')
                                            {{ $roomsatu->tim_b }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center"
                                    style="height: 15%; margin: 7% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                    <div class="column" style="margin: auto">
                                        @if ($roomsatu != '')
                                            {{ $roomsatu->tim_c }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h7 class="heading mb-4" style="color: #04092b; font-weight: bold">Room 2</h6>
                        <div class="card"
                            style="border: 1.5px solid #04092b; margin-bottom: 3%; background-color: #29f870; color: #04092b">
                            <div class="row" style="padding: 2%;">
                                <div class="column" style="width: 50%;">
                                    <span style="text-align: center; display:block;">Status</span>
                                    <span style="text-align: center; display:block; padding: 2%;">Bertanding @if ($roomdua != '')
                                            {{ $roomdua->waktu_tanding }}
                                        @endif
                                    </span>
                                    <span style="text-align: center; display:block; padding: 2%;">Persiapan</span>
                                    <span style="text-align: center; display:block; padding: 2% 0 0 1%;">Menunggu
                                        giliran</span>
                                    <span style="text-align: center; display:block; padding-bottom: 20px;">
                                        @if ($roomdua != '')
                                            {{ $roomdua->waktu_tunggu }}
                                        @endif
                                    </span>
                                </div>
                                <div class="column" style="width: 50%;">
                                    <div class="row justify-content-center"
                                        style="height: 15%; margin: 12% 10% 4% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                        <div class="column" style="margin: auto">
                                            @if ($roomdua != '')
                                                {{ $roomdua->tim_a }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row justify-content-center"
                                        style="height: 15%; margin: 4% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                        <div class="column" style="margin: auto">
                                            @if ($roomdua != '')
                                                {{ $roomdua->tim_b }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row justify-content-center"
                                        style="height: 15%; margin: 7% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                        <div class="column" style="margin: auto">
                                            @if ($roomdua != '')
                                                {{ $roomdua->tim_c }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h7 class="heading mb-4" style="color: #04092b; font-weight: bold">Room 3</h6>
                            <div class="card"
                                style="border: 1.5px solid #04092b; margin-bottom: 3%; background-color: #29f870; color: #04092b">
                                <div class="row" style="padding: 2%;">
                                    <div class="column" style="width: 50%;">
                                        <span style="text-align: center; display:block;">Status</span>
                                        <span style="text-align: center; display:block; padding: 2%;">Bertanding
                                            @if ($roomtiga != '')
                                                {{ $roomtiga->waktu_tanding }}
                                            @endif
                                        </span>
                                        <span style="text-align: center; display:block; padding: 2%;">Persiapan</span>
                                        <span style="text-align: center; display:block; padding: 2% 0 0 1%;">Menunggu
                                            giliran</span>
                                        <span style="text-align: center; display:block; padding-bottom: 20px;">
                                            @if ($roomtiga != '')
                                                {{ $roomtiga->waktu_tunggu }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="column" style="width: 50%;">
                                        <div class="row justify-content-center"
                                            style="height: 15%; margin: 12% 10% 4% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                            <div class="column" style="margin: auto">
                                                @if ($roomtiga != '')
                                                    {{ $roomtiga->tim_a }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row justify-content-center"
                                            style="height: 15%; margin: 4% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                            <div class="column" style="margin: auto">
                                                @if ($roomtiga != '')
                                                    {{ $roomtiga->tim_b }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row justify-content-center"
                                            style="height: 15%; margin: 7% 10% 5% 3%; border-radius: 5px; background-color: #04092b; color: white;"">
                                            <div class="column" style="margin: auto">
                                                @if ($roomtiga != '')
                                                    {{ $roomtiga->tim_c }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            fetch_data();

            function fetch_data() {
                $.ajax({
                    url: "/user/penyisihan/baronas/smp/fetch-data",
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        for (var count = 0; count < data.length; count++) {
                            var number = count + 1;
                            html +=
                                '<tr style="background-color: #29f870; font-weight: bold; color: #04092b">';
                            html += '<td>' + number + '</td>';
                            html += '<td class="column_name" data-column_name="nama_tim" data-id="' +
                                data[count].id + '">' + data[count].nama_tim + '</td>';
                            html += '<td class="column_name" data-column_name="skor" data-id="' + data[
                                count].id + '">' + data[count].skor + '</td>';
                            html += '<td class="column_name" data-column_name="waktu" data-id="' + data[
                                count].id + '">' + data[count].waktu + '</td>';
                            html +=
                                '<td class="column_name" data-column_name="jumlah_tanding" data-id="' +
                                data[count].id + '">' + data[count].jumlah_tanding + '</td>';
                        }
                        $('tbody').html(html);
                    }
                });
            }
        })
    </script>
@endsection
