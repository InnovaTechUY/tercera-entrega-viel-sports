<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/registro', [UserController::class, 'Create']);

Route::post('/login', [UserController::class, 'Authenticate']);

Route::post('/search', [UserController::class, 'getUser']);

Route::get('/getUsers', [UserController::class, 'getUsers'])
    ->name('authentication.getUsers');

Route::get('/logout', [UserController::class, 'Logout'])
    ->name('logout.validar');

Route::delete('delete', [UserController::class, 'deleteUser'])
    ->name('delete.user');

Route::get('edit/{id}', [UserController::class, 'editUser'])
    ->name('edit.user');

Route::post('update/{id}', [UserController::class, 'update'])
    ->name('usuario.update');

Route::post('/suscripcion', [UserController::class, 'createSuscribePay']);

Route::post('/suscripto', [UserController::class, 'tipoUsuario']);

Route::get('/usuario/{email}', [UserController::class, 'datosUsuario']);
