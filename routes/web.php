<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\user\HomeUserController;
use App\Http\Controllers\user\ProductController;


use App\Models\User;
use GuzzleHttp\Psr7\Request;

// Routes user
Route::prefix('/')->group(function(){
    Route::get('/', [HomeUserController::class, 'index'])->name('homeUser');

    Route::get('/page/{page?}', [HomeUserController::class, 'page'])->where([
        'page'=>"[0-9]+"
    ])->name('pagehome');

    Route::get('/form', [HomeUserController::class, 'viewform'])->name('formne');

    Route::get('/view', [HomeUserController::class, 'view']);

    Route::get('/product', [ProductController::class, 'home']);

    Route::post('/form', [HomeUserController::class, 'testForm']);


    Route::prefix('/login')->group(function(){
        Route::get('/', [AccountController::class, 'login'])->name('login');
        Route::post('/', [AccountController::class, 'checkLogin'])->name('checkLogin');
    });

});

// Routes admin
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function(){
    Route::get('/', [HomeAdminController::class, 'index']);

    Route::prefix('account')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/add', [AccountController::class, 'formAdd'])->name('admin.account.formAdd');
        Route::post('/add', [AccountController::class, 'add'])->name('admin.account.add');
        Route::get('/delete/{id?}', [AccountController::class, 'delete'])->name('admin.account.delete');
        Route::get('/update/{id?}', [AccountController::class, 'formUpdate'])->name('admin.account.formUpdate');
        Route::post('/update/{id?}', [AccountController::class, 'update'])->name('admin.account.update');
    });


    Route::get('/user', [AccountController::class, 'index']);
});
