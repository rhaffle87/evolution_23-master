<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaronasPaper extends Model
{
    use HasFactory;
    protected $fillable = [
        "email",
        "nama_ketua",
        "nama_anggota_1",
        "nama_anggota_2",
        "asal_sekolah",
        "alamat_sekolah",
        "nama_pembina",
        "no_hp",
        "judul",
        "subtema",
        "ktp_ketua",
        "ktp_anggota_1",
        "ktp_anggota_2",
        "file_paper",
        'bukti_bayar',
        'is_verified'
    ];
}
