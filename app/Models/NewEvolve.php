<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEvolve extends Model
{
    protected $fillable = [
        'nama', 'email', 'no_telp', 'instansi', 'nama_band', 'pembayaran_status',
        'is_verified', 'nama1', 'nama2', 'nama3', 'nama4', 'nama5', 'nama6', 'nama7',
        'scan', 'tiktok', 'instagram', 'pembayaran_nama', 'pembayaran_bank', 'no_invoice', 'top_5'
    ];

    use HasFactory;
}
