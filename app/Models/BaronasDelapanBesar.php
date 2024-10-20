<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaronasDelapanBesar extends Model
{
    use HasFactory;

    protected $fillable = [
        'baronas_id',
        'grade',
        'runtime'
    ];

    public function baronas()
    {
        return $this->belongsTo(Baronas::class, 'baronas_id', 'id');
    }

    public function baronasdelapanbesarmatches()
    {
        return $this->hasMany(BaronasDelapanBesarMatch::class);
    }

    public function opponents()
    {
        return $this->belongsToMany(baronasdelapanbesarmatches::class, 'baronas_delapan_besar_matches', 'team1_id', 'team2_id')->withPivot('result');
    }
}
