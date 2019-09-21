# Laravel API for Admin Panels

- [Introduction](#api-introduction)
- [Install](#api-install)

<a name="api-introduction"></a>
## Introduction

This is test for [link](https://kroxus.net). 


    php artisan 

<a name="api-install"></a>
#### Install



Add this line to Auth/LoginController

     public function redirectTo(){
        if (! app()->request->expectsJson()) {
            return '/home';
        }
        return '/auth';
    }


Add this line to HomeController

    public function auth()
    {
        if (Auth::check()) {
            return ['success'=>true, 'csrf'=>csrf_token(), 'data'=>Auth::user()];
        }

        return ['success'=>false, 'csrf'=>csrf_token()];
    }


web.php Routes 

    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/auth', 'HomeController@auth')->name('auth');
    
    LarExtApi::routes();
 