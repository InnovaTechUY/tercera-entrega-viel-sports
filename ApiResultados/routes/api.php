<?php

use App\Http\Controllers\ResultadosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/deportes', [ResultadosController::class, "getDeportes"]);

Route::get('/eventos/{deporte}', [ResultadosController::class, "getEventos"]);

Route::get('/equipos/{evento}', [ResultadosController::class, "getEquipos"]);
