<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountService;

class AccountController extends Controller
{
    public $data = [];

    public function index() {
        $listAccount = AccountService::getAll();
        $this->data['accounts'] = $listAccount;
        return "Hello user".$listAccount;
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
