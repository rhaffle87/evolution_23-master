<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaronasTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'kelompok',
    ];

    public function runningtestbaronas()
    {
        return $this->hasOne(RunningTestBaronas::class, 'kelompokid', 'id');
    }
}
