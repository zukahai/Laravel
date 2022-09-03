<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public $data = [];

    public function index() {;
        return view('user.pages.index');
    }

    public function formRequestStaff(){
        return view('user.pages.request_staff');
    }
}
