<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    $user = new User();
    $allUser = $user::all();
    dd($allUser);
    return view('welcome');
});

Route::get('/page/{page?}', function ($page=null) {
    $content = "";
    if ($page == null)
        $content .= "Khong co page" . "<br>";
    else
        $content .= "Page = ".$page."<br>";
    return $content;
})->where([
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

Route::prefix('admin')->group(function(){
    Route::get('/user', function(){
        return "Page Admin/home";
    });
});