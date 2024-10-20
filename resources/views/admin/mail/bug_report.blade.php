<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bug {{ $jenis_bug }}</title>
</head>

<body>
    {{-- send isi_bug and screenshot --}}
    <p>
    <h1>Laporan Bug {{ $jenis_bug }}</h1>
    <br>
    <h3>Pelapor: {{ $pelapor }}</h3>
    <br>
    <h3>Isi Bug:</h3>
    <p>{{ $isi_bug }}</p>

    </p>
</body>

</html>
