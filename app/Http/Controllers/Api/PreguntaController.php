<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{


    public function getRanking(){

    
        // Ranking global
        $rankingGlobal = DB::table('users')
        ->join('partidas', 'users.id', '=', 'partidas.user_id')
        ->join('partida_pregunta', 'partidas.id','=', 'partida_pregunta.partida_id')
        ->select('users.id','users.nickname', 'users.avatar', DB::raw('SUM(partida_pregunta.puntos) as total'))
        ->groupBy('users.id')
        ->orderBy('total', 'desc')
        ->take(50)
        ->get();
    
        return response()->json($rankingGlobal);       

    }

    function getRankingSemanal(){

        // Ranking semanal
        // Restar fechas: https://www.jose-aguilar.com/blog/sumar-restar-dias-una-fecha-php/
        // https://elinawebs.com/como-sumar-y-restar-fechas-con-php-con-strtotime-y-date/
        
        $fechaHoy = date('Y-m-d');
        $fechaSemanaPasada = date('Y-m-d', strtotime('-7 day', strtotime($fechaHoy)));

         $rankingSemanal = DB::table('users')
         ->join('partidas', 'users.id', '=', 'partidas.user_id')
         ->join('partida_pregunta', 'partidas.id','=', 'partida_pregunta.partida_id')
         ->select('users.id','users.nickname', 'users.avatar', DB::raw('SUM(partida_pregunta.puntos) as total'))
         ->whereBetween('partidas.fecha', [$fechaSemanaPasada, $fechaHoy])
         ->groupBy('users.id')
         ->orderBy('total', 'desc')
         ->take(50)
         ->get();

         return response()->json($rankingSemanal); 

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
