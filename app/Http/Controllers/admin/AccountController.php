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
        return view('admin.account.index', $this->data);
    }

    public function delete($id) {
        $this->accountService->delete($id);
        return $id;
    }

    public function update($id, Request $request) {
        $this->accountService->update($id, $request);
        return $id;
    }

    public function formAdd() {
        return view('admin.account.add');
    }

    public function destroy($id) {
        $this->accountService->destroy($id);
        return $id;
    }

    public function add($id, Request $request) {
        $this->accountService->add($id, $request);
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
