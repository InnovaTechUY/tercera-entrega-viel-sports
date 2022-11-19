<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Autenticacion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', [UsuarioController::class, "Banners"])
    ->name('inicio.index');

Route::get('/nosotros', function () {
    return view('layouts.nosotros');
})->name('nosotros.index');

Route::get('/resultados', function () {
    return view('layouts.resultados');
})->name('resultados.index');

Route::get('/terminos', function () {
    return view('layouts.terminos');
})->name('terminos.index');

Route::get('/suscripciones', function () {
    return view('layouts.suscripciones');
})->name('suscripciones.index');

Route::get('/suscribirse', function () {
    return view('layouts.suscribirse');
})->name('suscribirse.index');

Route::get('/contacto', function () {
    return view('layouts.contacto');
})->name('contacto.index');

Route::get('/login', function () {
    return view('layouts.login');
})->name('login.index');

Route::get('/registro', function () {
    return view('layouts.registro');
})->name('registro.index');

Route::get('/perfil', function () {
    return view('layouts.verPerfil');
})
    ->name('perfil.index')
    ->middleware(Autenticacion::class);

Route::get('/logout', [UsuarioController::class, "LogoutUser"]);

Route::get('/search', [UsuarioController::class, 'getUser']);

Route::post('/registro', [UsuarioController::class, "CreateUser"]);

Route::post('/login', [UsuarioController::class, "AuthUser"])
    ->name('login.auth');

Route::post('/suscribirse', [UsuarioController::class, "Suscripcion"])
    ->name('suscribirse.auth');
