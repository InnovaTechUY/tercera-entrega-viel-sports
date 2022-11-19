<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\GuardController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Notificaciones;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[GuardController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
 
            $usuarios = User::all(); 

        Route::view('/home','dashboard.admin.home',[ 'users' => $usuarios ])->name('home');
        Route::post('/logout',[GuardController::class,'logout'])->name('logout');
        Route::get('/admin',[AdminController::class,"getUsers"])->name('admin');
        Route::get('/resultados',[AdminController::class,"getListadosDeportesSistemasPuntajes"])->name('resultados');
    });

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function() {
    return view('layouts.login');
});

Route::post('/login',[AdminController::class,"postBanners"])
->name('login.auth');

