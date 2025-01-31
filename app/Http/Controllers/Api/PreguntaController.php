<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{


    public function getRanking(){

        $rankingGlobal = DB::table('users')
        ->join('partidas', 'users.id', '=', 'partidas.user_id')
        ->join('partida_pregunta', 'partidas.id','=', 'partida_pregunta.partida_id')
        ->select('users.nickname', 'users.avatar', DB::raw('SUM(partida_pregunta.puntos) as total'))
        ->groupBy('users.id')
        ->orderBy('total', 'desc')
        ->take(50)
        ->get();
    
        return response()->json($rankingGlobal);        
        

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
