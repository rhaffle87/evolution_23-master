<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baronas extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'email', 'nama_tim', 'kategori', 'nama_ketua', 'nama_anggota', 'nama_anggotadua', 'sekolah', 'alamat_sekolah', 'nama_pembina', 'nomor_hp', 'region', 'pembayaran_bank', 'pembayaran_atas_nama', 'pembayaran_status', 'pembayaran_bukti', 'tahapan_status', 'kategori', 'upload_twibbon', 'file_abstrak', 'file_ktp_ketua', 'file_ktp_anggota', 'file_ktp_anggotadua', 'file_full_paper', 'link_video', 'file_ppt', 'file_poster', 'link_drive'
    ];

    public function runningtestbaronas()
    {
        return $this->hasOne(RunningTestBaronas::class, 'baronas_id', 'id');
    }

    public function baronasmeetingrooms()
    {
        return $this->hasMany(BaronasMeetingRoom::class, 'baronas_id', 'id');
    }
}
