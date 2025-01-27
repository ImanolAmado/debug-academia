<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PreguntaController;
use App\Http\Controllers\Api\PartidaController;
use App\Http\Controllers\Api\UserController;

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
 
    Route::post('/registro', 'create')->name('registro.create'); 
});


Route::controller(PartidaController::class)->group(function(){
 
    Route::get('/partida', 'getPartida')->name('partida.getPartida'); 
});
   


