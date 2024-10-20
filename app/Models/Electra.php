<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electra extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'email', 'nama_tim', 'nama_ketua', 'kelas_ketua', 'nama_anggota', 'kelas_anggota', 'sekolah', 'alamat_sekolah', 'nomor_hp_ketua', 'nomor_hp_anggota', 'region', 'bukti_upload_twibbon_ketua', 'bukti_upload_twibbon_anggota', 'pembayaran_bank', 'pembayaran_atas_nama', 'pembayaran_status', 'pembayaran_bukti', 'file_ktp_ketua', 'file_ktp_anggota', 'id_semifinal', "status_lolos"
    ];
}
