<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function getBanners() {
        $banners = Banner::all();
        return $banners;
    }

    public function idBanner($idBanner) {
        $idbanners = Banner::findOrFile('$idBanner');

        return $idbanners;
    }

}
