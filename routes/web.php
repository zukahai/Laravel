<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Psr7\Request;

Route::get('/', [HomeController::class, 'index']);


Route::get('/login', 'App\Http\Controllers\Homecontroller@index')->name('login');


Route::get('/page/{page?}', [HomeController::class, 'page'])->where([
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


Route::prefix('admin')->middleware('checkadmin')->group(function(){
    Route::get('/', function(){
        return "Home admin";
    })->name('admin');
    Route::get('/user', function(){
        return "Page Admin/home";
    });
});