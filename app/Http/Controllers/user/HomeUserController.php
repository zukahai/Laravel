<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index() {
        $abc = "Hai";
        return view('user/index', compact('abc'));
    }
}
