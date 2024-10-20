<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaronasMeetingRoom extends Model
{
    use HasFactory;

    protected $table = 'baronas_meeting_rooms';

    protected $fillable = [
        'break_out_room_id',
        'status',
        'baronas_id',
        'kategori'
    ];

    public function baronas()
    {
        return $this->belongsTo(Baronas::class, 'baronas_id', 'id');
    }

    public function breakoutroom()
    {
        return $this->belongsTo(BreakOutRoom::class, 'break_out_room_id', 'id');
    }
}
