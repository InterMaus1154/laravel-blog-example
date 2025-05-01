<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;

Route::controller(ViewController::class)
    ->group(function () {
        // show main dashboard
        Route::get('/', 'index')->name('dashboard.index');

        // show login page
        Route::get('/login', 'showLogin')->name('dashboard.login');

        // show register page
        Route::get('/register', 'showRegister')->name('dashboard.register');
    });


// authentication routes
Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {

    Route::post('/login', 'login')->name('auth.login');

    Route::post('/register', 'register')->name('auth.register');
});

// routes requiring authenticated user
Route::middleware(AuthMiddleware::class)
    ->group(function(){
       Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
