<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body>
    <p>
        Yaayy! Selamat pendaftaran kamu telah berhasil. <br>
        Silahkan verifikasi email Anda untuk mengaktifkan akun Evolution 2023<br>
        <a href="{{ url('/verifikasi/') }}/{{ $id }}" role="button">Aktifkan Akun</a>
    </p>
</body>

</html>
