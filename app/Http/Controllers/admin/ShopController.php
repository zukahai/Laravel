<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
//        return "Hello";
        return view('shop.pages.index');
    }
}
