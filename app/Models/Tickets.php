<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    public $table = "ticket_evolve";

    protected $fillable = [
        'no_ticket', 'evolve_id', 'is_checked_in'
    ];

    public function evolves()
    {
        return $this->belongsTo(Evolve::class, 'evolve_id', 'id');
    }
}