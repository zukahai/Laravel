<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    $user = new User();
    $allUser = $user::all();
    dd($allUser);
    return view('welcome');
});

Route::get('/a', function () {
    return view('abc');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/form', function () {
    return "Post ne";
});

Route::put('/form', function () {
    return "Put ne";
});

Route::prefix('admin')->group(function(){
    Route::get('/user', function(){
        return "Page Admin/home";
    });
});