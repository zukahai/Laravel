<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index() {
        $account = new Account();
        $account->username = "linhne";
        $account->password = "Hai ne";
        $account->save();
        $users = Account::all();
        dd($users);
        return "Hello user";
    }

    public function login() {
        return View('admin/account/login');
    }

    public function checkLogin(Request $request) {
        $allData = $request->all();
        dd($allData);
        return View('admin.index');
    }
}
