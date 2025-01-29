<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pregunta extends Model
{    
    use HasFactory, HasApiTokens;

    function partidas(){
        return $this->belongsToMany(Partida::class)->withPivot(['puntos','acierto','respuesta']);

    }

}
