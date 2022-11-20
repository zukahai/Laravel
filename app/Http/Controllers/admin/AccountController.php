<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AccountService;
use App\Http\Services\RoleService;
use App\Models\Account;
use App\User;
use Cookie;
use Illuminate\Http\Request;

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
        // Them luon role 'user' khi tao tai khoan
        $this->roleAccountController->create($account->id);

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

    public function login() {
        auth()->logout();
        $this->accountService->clearCookie();
        return View('admin.pages.account.login');
    }

    public function checkLogin(Request $request) {
        $request->flash();
        $username = $request->username;
        $password = $request->password;
        $account = $this->accountService->checkLogin($username, $password);

        if ($account != null) {
            if(User::where('account_id', '=', $account->id)->first() == null) {
                $user = new User();
                $user->account_id = $account->id;
                $user->save();
            }
            $user = $account->user;
            auth()->login($user);
//            $this->accountService->setcookie($username, $password);
        }

        if ($account == null) {
            return redirect(route('login'))->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        } else {
            if (auth()->user()->account->roles->where('role_name', '=', 'admin')->count() > 0)
                return redirect(route('admin.account.index'))->with('info', 'Đăng nhập admin thành công');
            else if (auth()->user()->account->roles->where('role_name', '=', 'staff')->count() > 0)
                return redirect(route('staff.index'))->with('info', 'Đăng nhập nhân viên thành công');
            else
                return redirect(route('homeUser'))->with('info', 'Đăng nhập người dùng thành công');
        }
    }
}
