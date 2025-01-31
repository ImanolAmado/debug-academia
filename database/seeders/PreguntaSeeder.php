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

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué es una relación N:M?";
     $pregunta->respuesta1 = "Relación None to Many";
     $pregunta->respuesta2 = "Relación Uno a Muchos";
     $pregunta->respuesta_correcta ="Relación Many to Many";
     $pregunta->imagen = "images/06.jpg";
     $pregunta->categoria = "BBDD";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "El siguiente cuadro resumen representa las opciones de...";
     $pregunta->respuesta1 = "Relaciones cuaternarias";
     $pregunta->respuesta2 = "Relaciones inclusivas";
     $pregunta->respuesta_correcta ="Relaciones ISA";
     $pregunta->imagen = "images/07.jpg";
     $pregunta->categoria = "BBDD";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "Grado y cardinalidad de la siguiente tabla:";
     $pregunta->respuesta1 = "Grado 5 pero sin tuplas";
     $pregunta->respuesta2 = "Cardinalidad 3, grado 5";
     $pregunta->respuesta_correcta ="Grado 3, cardinalidad 5";
     $pregunta->imagen = "images/08.jpg";
     $pregunta->categoria = "BBDD";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué son las bases de datos NoSQL?";
     $pregunta->respuesta1 = "BBDD relacionales";
     $pregunta->respuesta2 = "BBDD sin SQL";
     $pregunta->respuesta_correcta ="BBDD no relacionales";
     $pregunta->imagen = "images/09.jpg";
     $pregunta->categoria = "BBDD";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Los procedimientos devuelven algún valor?";
     $pregunta->respuesta1 = "Depende";
     $pregunta->respuesta2 = "Si";
     $pregunta->respuesta_correcta ="No";
     $pregunta->imagen = "images/10.jpg";
     $pregunta->categoria = "BBDD";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "En la siguiente imagen, tenemos un...";
     $pregunta->respuesta1 = "Diagrama E/R";
     $pregunta->respuesta2 = "Diagrama relacional";
     $pregunta->respuesta_correcta ="Diagrama de flujo";
     $pregunta->imagen = "images/11.jpg";
     $pregunta->categoria = "Entornos de desarrollo";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "No debemos refactorizar un código cuando hay...";
     $pregunta->respuesta1 = "Código duplicado";
     $pregunta->respuesta2 = "Métodos largos";
     $pregunta->respuesta_correcta ="Código mal hecho";
     $pregunta->imagen = "images/12.jpg";
     $pregunta->categoria = "Entornos de desarrollo";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿UML es un lenguaje de programación?";
     $pregunta->respuesta1 = "Si";
     $pregunta->respuesta2 = "Depende";
     $pregunta->respuesta_correcta ="No";
     $pregunta->imagen = "images/13.jpg";
     $pregunta->categoria = "Entornos de desarrollo";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Cúal de estas asignaturas NO es entornos?";
     $pregunta->respuesta1 = "Servidor";
     $pregunta->respuesta2 = "Cliente";
     $pregunta->respuesta_correcta ="Despliegues";
     $pregunta->imagen = "images/14.jpg";
     $pregunta->categoria = "Entornos de desarrollo";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "Los grafos de flujo se utilizan en pruebas de...";
     $pregunta->respuesta1 = "JUnit";
     $pregunta->respuesta2 = "Caja negra";
     $pregunta->respuesta_correcta ="Caja blanca";
     $pregunta->imagen = "images/15.jpg";
     $pregunta->categoria = "Entornos de desarrollo";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué significa HTML";
     $pregunta->respuesta1 = "HyperText Multi Language";
     $pregunta->respuesta2 = "HyperLink Markup Language";
     $pregunta->respuesta_correcta ="HyperText Markup Language";
     $pregunta->imagen = "images/16.jpg";
     $pregunta->categoria = "Lenguaje de marcas";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué sistemas NO utilizamos para validar documentos XML?";
     $pregunta->respuesta1 = "DTD";
     $pregunta->respuesta2 = "XML Schema";
     $pregunta->respuesta_correcta ="XSLT";
     $pregunta->imagen = "images/17.jpg";
     $pregunta->categoria = "Lenguaje de marcas";
     $pregunta->save();
    
     $pregunta = new Pregunta();
     $pregunta->pregunta = "Una web responsive...";
     $pregunta->respuesta1 = "Es mobile first";
     $pregunta->respuesta2 = "Es desktop first";
     $pregunta->respuesta_correcta ="Varía según dispositivo";
     $pregunta->imagen = "images/18.jpg";
     $pregunta->categoria = "Lenguaje de marcas";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "JavaScript es un lenguaje de programación compilado";
     $pregunta->respuesta1 = "Verdadero";
     $pregunta->respuesta2 = "Ambas son correctas";
     $pregunta->respuesta_correcta ="Falso";
     $pregunta->imagen = "images/19.jpg";
     $pregunta->categoria = "Lenguaje de marcas";
     $pregunta->save();

     $pregunta = new Pregunta();
     $pregunta->pregunta = "¿Qué significa CSS?";
     $pregunta->respuesta1 = "Cascading Sheet Style ";
     $pregunta->respuesta2 = "Cascading Schematic Style";
     $pregunta->respuesta_correcta ="Cascading Style Sheets";
     $pregunta->imagen = "images/20.jpg";
     $pregunta->categoria = "Lenguaje de marcas";
     $pregunta->save();
    

    


    }
}
