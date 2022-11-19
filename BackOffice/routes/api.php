<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GuardController;
use App\Http\Controllers\EmailController;
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


Route::get('/login',function() {
    return view('layouts.login');
});

Route::get('/banner',function() {
    return view('layouts.getBanners');
});

Route::get('/banners',[AdminController::class,"getBanners"]);

Route::post('/banner',[AdminController::class,"postBanners"])
->name('banner.auth');

// 28 Octubre

Route::get('/resultados/equipos',[AdminController::class,"ListaEquiposDeJugadores"]);

Route::get('/resultados/{idEquipo}',[AdminController::class,"ListajugadoresDeEquipos"]);

 Route::post('/deporte',[AdminController::class,"postDeportes"])
->name('deportes.auth');

Route::post('/eventos',[AdminController::class,"postEventos"])
->name('eventos.auth');

Route::post('/director',[AdminController::class,"postDT"])
->name('director.auth');

Route::post('/arbitro',[AdminController::class, "postArbitro"])
->name('arbitro.auth');

Route::post('/equipos',[AdminController::class,"postEquipos"])
->name('equipos.auth');

Route::post('/jugadores',[AdminController::class,"postJugadores"])
->name('jugadores.auth'); 

Route::post('/tiporesultado',[AdminController::class,"addset"])
->name('resultado.auth'); 

Route::post('/notificacion',[EmailController::class,"EnviarMail"]);

Route::get('/notificacion',function() {
    return view('emails.notificaciones');
});

Route::post('/crearAdmin', [GuardController::class, "create"]);




