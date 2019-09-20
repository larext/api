<?php

namespace LarExt\API;

use Illuminate\Support\Facades\Route;

class LarExtApi
{
    public function routes()
    {
        Route::get('larext/auth', '\\LarExt\\API\\Controllers\\LoginController@auth');
        Route::post('larext/login', '\\LarExt\\API\\Controllers\\LoginController@login');
        Route::post('larext/logout', '\\LarExt\\API\\Controllers\\LoginController@logout');
    }
}