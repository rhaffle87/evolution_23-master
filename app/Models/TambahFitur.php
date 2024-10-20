<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambahFitur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengaju',
        'nomor',
        'sub_divisi',
        'permintaan',
        'gambar',
        'video',
        'status_develop',
        'status_review',
        'status_selesai'
    ];
}
