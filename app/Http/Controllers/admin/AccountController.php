<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AccountService;
use App\Models\Account;

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

    public function add(Request $request) {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required|',
            ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        $account = new Account();
        $account->username = $request->username;
        $account->password = $request->password;
        $this->accountService->add($account);

        $this->data['success'] = true;
        return redirect(route('admin.account.index'));
    }


    public function destroy($id) {
        $this->accountService->destroy($id);
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
