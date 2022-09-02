<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AccountService;
use App\Http\Services\RoleService;
use App\Http\Controllers\admin\RoleAccountController;
use App\Http\Services\RoleAccountService;
use App\Models\Account;
use Cookie;

class AccountController extends Controller
{
    public $data = [];

    protected $limit = 10;

    public function __construct(AccountService $accountService,
                                RoleService $roleService,
                                RoleAccountController $roleAccountController)
    {
        $this->accountService = $accountService;
        $this->roleAccountController = $roleAccountController;
        $this->roleService = $roleService;
    }

    public function index(Request $request) {
        $keywords = $request->keywords;
        $listAccount = $this->accountService->paginate($this->limit, $keywords);
        $this->data['accounts'] = $listAccount;
        return view('admin.pages.account.index', $this->data);
    }

    public function add(Request $request) {
        $request->flash();
        $this->validateForm($request);
        $account = new Account();
        $account->username = $request->username;
        $account->password = $request->password;
        $this->accountService->add($account);

        $this->roleAccountController->create($account->id);


//        for ($i=55; $i <= 555; $i++) {
//            $account = new Account();
//            $account->username = 'user_' . $i;
//            $account->password = 'password_' . $i;
//            $this->accountService->add($account);
//        }

        return redirect(route('admin.account.index'))->with('info', 'Thêm thành công');
    }

    public function delete($id=null) {
        if ($id == null)
            return false;
        $this->accountService->delete($id);
        return $id;
    }

    public function role($id=null) {
        $account = $this->accountService->find($id);
        return $account->roles()->get();
    }

    public function formUpdate($id=null) {
        if ($id == null)
            return false;
        $this->data['account'] = $this->accountService->find($id);
        return view("admin.pages.account.edit", $this->data);
    }

    public function update($id, Request $request) {
        $request->validate(
            [
                'password' => 'required|min:6',
            ],
            [
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất phải 6 ký tự',
            ]
        );
        $data = ['id'=>$id,'username' => $request->username, 'password' => $request->password];
        $this->accountService->update($id, $data);
        return redirect(route('admin.account.index'))->with('info', 'Thông tin đã được cập nhật');
    }

    public function formAdd() {
        return view('admin.pages.account.create');
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
                'password.min' => 'Mật khẩu ít nhất phải 6 ký tự',
            ]
        );
    }

    public function destroy($id) {
        $this->accountService->destroy($id);
        return $id;
    }

    public function login($msg = 123) {
        $this->accountService->clearCookie();
        return View('admin.pages.account.login')->with('msg', $msg);
    }

    public function checkLogin(Request $request) {
        $request->flash();
        $username = $request->username;
        $password = $request->password;

        $account = $this->accountService->checkLogin($username, $password);

        if ($account != null) {
            $this->accountService->setcookie($username, $password);
        }
        if ($account == null) {
            return redirect(route('login'))->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        } else {
//            dd(array_search('admin', $this->accountService->getNameRole($account->roles)));
            if (array_search('admin', $this->accountService->getNameRole($account->roles)) !== false)
                return redirect(route('admin.account.index'))->with('info', 'Đăng nhập admin thành công');
            else if (array_search('staff', $this->accountService->getNameRole($account->roles)) !== false)
                return redirect(route('staff.index'))->with('info', 'Đăng nhập nhân viên thành công');
            else
                return redirect(route('homeUser'))->with('info', 'Đăng nhập người dùng thành công');
        }
    }
}
