<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Partida;
use App\Models\User;
use \Auth;
use \Illuminate\Support\Facades\Log;


class PartidaController extends Controller
{

    // Servir una partida
    public function getPartida(){

         // Se comprueba si el usuario ha jugado ese día
         $id = Auth::user()->id;
         $fecha = date('Y-m-d');
         $partidaHoy = Partida::where('fecha', $fecha)->where('id',$id)->get();
        

         // Si no ha jugado, servimos partida
         if(count($partidaHoy)==0){      
       
        // Se recogen datos de la BBDD y se seleccionan 
        // 2 elementos aleatorios y únicos        
        $preguntas = Pregunta::all();
        $datos=$preguntas->random(2)->unique();  
        $lista=[];
        $partida=[];        

        // Se monta un objeto nuevo y hacemos que el orden
        // de las respuestas sea aleatorio. Cambiamos el nombre
        // de la columna "respuesta_correcta" por "respuesta3".
        foreach($datos as $dato){
            array_push($lista, $dato->respuesta1);
            array_push($lista, $dato->respuesta2);
            array_push($lista, $dato->respuesta_correcta);
            shuffle($lista);

            $p = new Pregunta();
            $p->id = $dato->id;
            $p->pregunta = $dato->pregunta;
            $p->imagen = $dato->imagen;
            $p->categoria = $dato->categoria;
            $p->respuesta1 = $lista[0];
            $p->respuesta2 = $lista[1];
            $p->respuesta3 = $lista[2];
            $lista = [];
            array_push($partida, $p);  
        }        
        return response()->json($partida); 

        // Si el usuario ya ha jugado ese día, devolvemos error
        } else {
            return response()->json(['messaje' => 'Espera hasta mañana para jugar'], 499);
        }
        
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // Guarda las respuestas de partida de un usuario 
    public function store(Request $request)
    {   
                
        // Se guarda nueva partida en BBDD
        // TABLA PARTIDA
        $partida = new Partida();
        $partida->user_id = Auth::user()->id;
        //Log::info("mensaje");
        $partida->fecha = date('Y-m-d');        
        $partida->save();
        $latestId = Partida::latest('id')->first()->id; 
        
       // No se puede iterar directamente "request"
        $datos = $request->all(); 
        $puntos=0;
        $correcto=false;
        $resumen = [];

        
        foreach($datos as $dato){   
        // Gestión / Inserción  datos en BBDD    
            $respuestaCorrecta = Pregunta::select('respuesta_correcta')->where('id',$dato['id_pregunta'])->get();
            if($dato['respuesta']==$respuestaCorrecta[0]->respuesta_correcta){
                $puntos=$puntos + 1;
                $correcto=true;
            }
            $partida->preguntas()->attach($dato['id_pregunta'], [
                'puntos'    => $puntos,
                'acierto'   => $correcto,
                'respuesta' => $dato['respuesta']
               
            ]);
            $puntos=0; 
            $correcto=false;
        } 
        
        // Cogemos la partida actual
        $partidaActual = Partida::find( $latestId);
        $resumen = $partidaActual->preguntas;

        return response()->json($resumen);      
   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
