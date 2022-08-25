<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AccountService;

class AccountController extends Controller
{
    public $data = [];

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index() {
        $listAccount = $this->accountService->getAll();
        $this->data['accounts'] = $listAccount;
        return view('user.index', $this->data);
    }

    public function delete($id) {   
        return $id;
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
