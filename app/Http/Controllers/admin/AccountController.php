<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AccountService;
use App\Models\Account;
use Cookie;

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

    public function delete($id=null) {
        if ($id == null)
            return false;
        $this->accountService->delete($id);
        return $id;
    }

    public function formUpdate($id=null) {
        if ($id == null)
            return false;
        $this->data['account'] = $this->accountService->find($id);
        return view("admin.account.update", $this->data);
    }

    public function update($id=null, Request $request) {
        $request->validate(
            [
                'password' => 'required|min:6',
            ],
            [
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải 6 ký tự',
            ]
        );
        $data = ['id'=>$id,'username' => $request->username, 'password' => $request->password];
        $this->accountService->update($id, $data);
        return redirect(route('admin.account.index'));
    }

    public function formAdd() {
        return view('admin.account.add');
    }

    public function validateForm($request) {
        $request->validate(
            [
                'username' => 'required|unique:accounts|max:15|alpha_dash',
                'password' => 'required|min:6',
            ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'username.unique' => 'Tên tài khoản đã được sử dụng',
                'username.max' => 'Tên tài khoản không được quá 15 ký tự',
                'username.alpha_dash' => 'Tên tài khoản không chứa ký tự đặc biệt',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải 6 ký tự',
            ]
        );
    }

    public function add(Request $request) {
        $this->validateForm($request);
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
        $username = $request->username;
        $password = $request->password;

        $account = $this->accountService->checkLogin($username, $password);

        if ($account != null) {
            Cookie::queue('username', $username, 120);
            Cookie::queue('password', $password, 120);
        }
        if ($account == null) {
            return redirect(route('login'));
        } else {
            if ($account->role == 'admin')
                return redirect(route('admin.account.index'));
            else
                return redirect(route('homeUser'));
        }
    }
}
