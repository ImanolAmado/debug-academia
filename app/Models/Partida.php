<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Partida extends Model
{
    use HasFactory, HasApiTokens;

    function user(){
        return $this->belongsTo('User::class');
    }

    function preguntas(){
        return $this->belongsToMany(Pregunta::class)->withPivot(['puntos','acierto','respuesta','fecha']);
    }

}
