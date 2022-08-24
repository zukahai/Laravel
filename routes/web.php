<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\user\HomeUserController;
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
});

// Routes admin
Route::prefix('admin')->middleware('checkadmin')->group(function(){
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin');
    Route::get('/user', function(){
        return "Page Admin/home";
    });
});

Route::get('/login', [HomeController::class, 'login'])->name('login');