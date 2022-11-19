<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoJugador extends Model
{
    use HasFactory;
    protected $table = 'jugador_equipo';
    protected $fillable = ['idJugador','idEquipo'];
}
