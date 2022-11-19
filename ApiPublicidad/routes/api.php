<?php

use App\Http\Controllers\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/banners', [BannerController::class, "getBanners"]);

Route::get('/idBanners', [BannerController::class, "idBanner"]);
