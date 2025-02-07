<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PreguntaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']
)->middleware(['auth', 'verified','role:admin'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin'])->name('dashboard');


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
    Route::get('/usuarios_edit/{usuario}', [UserController::class, 'edit'])->name('user.edit'); 
    Route::post('/usuarios_store', [UserController::class, 'store'])->name('user.store');
    Route::put('/usuarios_update/{usuario}', [UserController::class, 'update'])->name('user.update');
    Route::get('/usuarios_create', [UserController::class, 'create'])->name('user.create');
    Route::delete('/usuarios_destroy/{usuario}', [UserController::class, 'destroy'])->name('user.destroy');
});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/preguntas', [PreguntaController::class, 'index'])->name('pregunta.index');
    Route::get('/preguntas_edit/{pregunta}', [PreguntaController::class, 'edit'])->name('pregunta.edit'); 
    Route::post('/preguntas_store', [PreguntaController::class, 'store'])->name('pregunta.store');
    Route::put('/preguntas_update/{pregunta}', [PreguntaController::class, 'update'])->name('pregunta.update');
    Route::get('/preguntas_create', [PreguntaController::class, 'create'])->name('pregunta.create');
    Route::get('/preguntas_api', [PreguntaController::class, 'createApi'])->name('pregunta.api');
    Route::delete('/preguntas_destroy/{pregunta}', [PreguntaController::class, 'destroy'])->name('pregunta.destroy');
});












require __DIR__.'/auth.php';
