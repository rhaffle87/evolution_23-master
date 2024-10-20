<input type="text" hidden value="{{ $data->nomor }}" id="nomor">
<input type="text" hidden value="{{ $pesan }}" id="pesan">

<script>
    // auto redirect to wa.me to a new page
    var nomor = document.getElementById('nomor').value;
    var pesan = document.getElementById('pesan').value;
    window.open('https://wa.me/' + nomor + '?text=' + pesan, '_blank');
</script>
