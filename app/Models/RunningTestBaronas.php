<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningTestBaronas extends Model
{
    use HasFactory;

    protected $table = 'running_test_baronas';

    protected $fillable = [
        'jumlah_running',
        'jumlah_nilai',
        'jumlah_waktu',
        'baronas_id',
        'peringkat',
        'note',
        'kelompokid'
    ];

    public function baronas()
    {
        return $this->belongsTo(Baronas::class, 'baronas_id', 'id');
    }

    public function baronasteam()
    {
        return $this->belongsTo(BaronasTeam::class, 'kelompokid', 'id');
    }
}
