<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use \DB;



class HomeController extends Controller
{

 public function index(){

    return view('home');

} 


public function aciertos(Request $request){

    if($request->ajax()){    

        // Consigue num aciertos y total
        $preguntas = DB::table('preguntas')
        ->join('partida_pregunta', 'preguntas.id', '=', 'partida_pregunta.pregunta_id')
        ->select('preguntas.id', 'preguntas.pregunta', 'preguntas.categoria', 
        DB::raw('COUNT(partida_pregunta.id) as intentos'), 
        DB::raw('COUNT(case when partida_pregunta.acierto = true then 1 end) as aciertos'))
        ->groupBy('preguntas.id', 'preguntas.pregunta', 'preguntas.categoria')
        ->orderBy('aciertos', 'desc')
        ->get();

        // Recorremos el array para calcular el porcentaje
        foreach($preguntas as $pregunta){
            $pregunta->porcentaje = round(($pregunta->aciertos * 100 / $pregunta->intentos),2);
        }        

        // No funciona ordenar
        //$preguntas = $preguntas->sortByDesc('porcentaje')->values();

        return DataTables::of($preguntas)->toJson();                
    }

    return view('home');
}


public function diaMasJugado(Request $request){

    if($request->ajax()){  

    // fecha de hoy restamos 30 días
    // https://elinawebs.com/como-sumar-y-restar-fechas-con-php-con-strtotime-y-date/
    
    $fechaHoy = date('d-m-Y');
    $fechaMesPasado = date('Y-m-d', strtotime('-29 day', strtotime($fechaHoy)));

    $partidas = DB::table('partidas')
    ->select('partidas.fecha',     
    DB::raw('COUNT(partidas.id) as num'))
    ->whereBetween('partidas.fecha', [$fechaMesPasado, $fechaHoy])
    ->groupBy('partidas.fecha')
    ->orderBy('num', 'desc')
    ->get();

    return DataTables::of($partidas)->toJson();  

    }

    return view('home');

}


public function partidasDia(Request $request){
              
    if($request->ajax()){  
           
        $partidas = DB::table('partidas')
        ->select('partidas.fecha',     
        DB::raw('COUNT(partidas.id) as num'))       
        ->groupBy('partidas.fecha')
        ->orderBy('partidas.fecha', 'asc')
        ->get();           
     
        return response()->json($partidas);
    }    

}

public function aciertosDia(Request $request){
              
    if($request->ajax()){  

        $fechaHoy = date('d-m-Y');
        $fechaInicio = date('Y-m-d', strtotime('-9 day', strtotime($fechaHoy)));

           
        $aciertosDia = DB::table('partida_pregunta')
        ->select('partida_pregunta.fecha',     
        DB::raw('count(*) as total')) 
        ->whereBetween('partida_pregunta.fecha', [$fechaInicio, $fechaHoy])
        ->where('partida_pregunta.acierto', true)      
        ->groupBy('partida_pregunta.fecha')
        ->orderBy('partida_pregunta.fecha', 'asc')                 
        ->get();    
     
        return response()->json($aciertosDia);
    }    

}
    
}