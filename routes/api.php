<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PreguntaController;
use App\Http\Controllers\Api\PartidaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::post('/registro', 'registro')->name('user.registro');
    Route::middleware('auth:sanctum')->get('/userstats','getUserStats')->name('user.getUserStats'); 
    
});

Route::controller(PartidaController::class)->group(function(){
    Route::middleware('auth:sanctum')->get('/partida', 'getPartida')->name('partida.getPartida'); 
    Route::middleware('auth:sanctum')->post('/partida', 'store')->name('partida.postPartida'); 
});
   

Route::controller(PreguntaController::class)->group(function(){
    Route::get('/ranking', 'getRanking')->name('pregunta.getRanking'); 
    Route::get("/rankingsemanal", 'getRankingSemanal')->name('pregunta.getRankinSemanal');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('login',  'login');
    Route::middleware('auth:sanctum')->post('logout',  'logout');
});


