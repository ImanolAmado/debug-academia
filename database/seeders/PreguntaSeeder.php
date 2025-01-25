<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué resultado obtendremos en la terminal al ejecutar el siguiente código?";
     $pregunta->respuesta1 = "HOLA";
     $pregunta->respuesta2 = "Hola";
     $pregunta->respuesta_correcta ="hola";
     $pregunta->imagen = "images/01.jpg";
     $pregunta->categoria = "Programación";
     $pregunta->save();


     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Tienes que pagar impuestos?";
     $pregunta->respuesta1 = "Depende";
     $pregunta->respuesta2 = "Si";
     $pregunta->respuesta_correcta ="No";
     $pregunta->imagen = "images/02.jpg";
     $pregunta->categoria = "Programación";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿En el siguiente extracto de código...";
     $pregunta->respuesta1 = "Se crea una tabla";
     $pregunta->respuesta2 = "int = 20";
     $pregunta->respuesta_correcta ="Se declara un array";
     $pregunta->imagen = "images/03.jpg";
     $pregunta->categoria = "Programación";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "Al final del siguiente código, ¿Qué valor tiene a?";
     $pregunta->respuesta1 = "0";
     $pregunta->respuesta2 = "1";
     $pregunta->respuesta_correcta ="2";
     $pregunta->imagen = "images/04.jpg";
     $pregunta->categoria = "Programación";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "Reemplaza [?] por la opción correcta";
     $pregunta->respuesta1 = "int";
     $pregunta->respuesta2 = "Integer";
     $pregunta->respuesta_correcta ="boolean";
     $pregunta->imagen = "images/05.jpg";
     $pregunta->categoria = "Programación";
     $pregunta->save();


    }
}
