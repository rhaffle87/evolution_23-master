<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaronasDelapanBesarMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'team1_id',
        'team2_id',
        'result',
        'kelompok',
        'giliran',
        'status'
    ];

    public function team1()
    {
        return $this->belongsTo(BaronasDelapanBesar::class, 'team1_id', 'id');
    }

    public function team2()
    {
        return $this->belongsTo(BaronasDelapanBesar::class, 'team2_id', 'id');
    }
}
