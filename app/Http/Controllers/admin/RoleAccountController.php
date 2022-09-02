<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleAccountRequest;
use App\Http\Requests\UpdateRoleAccountRequest;
use App\Models\RoleAccount;
use App\Http\Services\RoleAccountService;
use App\Http\Services\RoleService;
use App\Http\Services\AccountService;
use Illuminate\Http\Request;

class RoleAccountController extends Controller
{

    public $data = [];

    public function __construct(RoleAccountService $roleAccountService, RoleService $roleService, AccountService $accountService)
    {
        $this->roleAccountService = $roleAccountService;
        $this->roleService = $roleService;
        $this->accountService = $accountService;
    }

    public function index()
    {
        //
    }
    public function create($id_account)
    {
        $roleAccount = new RoleAccount();
        $roleAccount->id_account = $id_account;
        $roleAccount->id_role = $this->roleService->findByRoleName('user')->id;
        $this->roleAccountService->add($roleAccount);
    }

    public function add(Request $request)
    {
        $roleAccount = new RoleAccount();
        $roleAccount->id_account = $request->id_account;
        $roleAccount->id_role = $request->id;
        $this->roleAccountService->add($roleAccount);
        return back()->with('info', 'Thêm thành công');
    }

    public function store(StoreRoleAccountRequest $request)
    {
        //
    }

    public function show(RoleAccount $roleAccount)
    {
        //
    }

    public function delete($id)
    {
        $this->roleAccountService->delete($id);
        return $id;
    }

    public function edit(RoleAccount $roleAccount)
    {
        //
    }

    public function update(UpdateRoleAccountRequest $request, RoleAccount $roleAccount)
    {
        //
    }

    public function destroy(RoleAccount $roleAccount)
    {
        //
    }

    public function findByIdAccount($id_account) {
        return $this->roleAccountService->findByIdAccount($id_account);
    }

    public function findByIdRole(Request $request) {
        $id_role = $request->id;
        $roles_account = $this->roleAccountService->findByIdRole($id_role);
        $this->data['roles_account'] = $roles_account;
        $accounts = $this->accountService->getAll();
        $this->data['accounts'] = $accounts;

        $role = $this->roleService->find($id_role);
        $accounts_role = $role->accounts;

        $accounts = $accounts->diff($accounts_role);
        $this->data['accounts'] = $accounts;
        return view('admin.pages.role.detail', $this->data);
    }
}
