<?php

namespace LarExt\API;

use Illuminate\Support\Facades\Route;
use App\User;

class LarExtApi
{
    public function routes()
    {

        Route::group(['middleware' => 'auth'], function(){
            Route::resource('larext/products', '\\LarExt\\API\\Controllers\\ProductsController');
        });

    }
}