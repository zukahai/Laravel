<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\user\HomeUserController;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\HomeController;

use App\Models\User;
use GuzzleHttp\Psr7\Request;

// Routes user
Route::prefix('/')->group(function(){
    Route::get('/', [HomeUserController::class, 'index']);

    Route::get('/page/{page?}', [HomeUserController::class, 'page'])->where([
        'page'=>"[0-9]+"
    ])->name('pagehome');

    Route::get('/form', function () {
        return view('form');
    })->name('formne');

    Route::post('/form', function () {
        return "Post ne";
    });

    Route::put('/form', function () {
        return "Put ne";
    });

    Route::prefix('/login')->group(function(){
        Route::get('/', [AccountController::class, 'login'])->name('login');
    });
    
});

// Routes admin
Route::prefix('admin')->group(function(){
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin');

    Route::get('/account', [AccountController::class, 'index']);

    Route::get('/user', function(){
        return "Page Admin/home";
    });
});
