<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        return View('admin/account/index');
    }

    public function login() {
        return View('admin/account/login');
    }
}
