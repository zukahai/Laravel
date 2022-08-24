<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\user\HomeUserController;
use App\Http\Controllers\user\AccountController;

use App\Models\User;
use GuzzleHttp\Psr7\Request;

// Routes user
Route::prefix('/')->group(function(){
    Route::get('/', [HomeUserController::class, 'index'])->name('homeuser');

    Route::get('/page/{page?}', [HomeUserController::class, 'page'])->where([
        'page'=>"[0-9]+"
    ])->name('pagehome');

    Route::get('/form', [HomeUserController::class, 'viewform'])->name('formne');

    Route::get('/view', [HomeUserController::class, 'view']);

    Route::post('/form', [HomeUserController::class, 'getForm']);

    Route::put('/form', function () {
        return "Put ne";
    });

    Route::prefix('/login')->group(function(){
        Route::get('/', [AccountController::class, 'login'])->name('login');
        Route::post('/', [AccountController::class, 'checkLogin'])->name('checkLogin');
    });
    
});

// Routes admin
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function(){
    Route::get('/', [HomeAdminController::class, 'index']);

    Route::get('/account', [AccountController::class, 'index']);

    Route::get('/user', function(){
        return "Page Admin/home";
    });
});
