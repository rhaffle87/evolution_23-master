<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakOutRoom extends Model
{
    use HasFactory;

    protected $table = 'break_out_rooms';

    protected $fillable = [
        'nama_ruangan'
    ];

    public function baronasmeetingrooms()
    {
        return $this->hasMany(BaronasMeetingRoom::class, 'break_out_room_id', 'id');
    }
}
