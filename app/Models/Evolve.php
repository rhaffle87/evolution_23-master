<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolve extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran', 'email', 'nama', 'tanggal_lahir', 'institusi', 'alamat', 'no_identitas', 'nomor_telp',
        'jumlah_tiket', 'total_harga', 'pembayaran_bank', 'pembayaran_nama', 'pembayaran_bukti', 'is_verified', 'is_ticket_send', 'pembayaran_status', 'checked_in'
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'evolve_id', 'id');
    }
}