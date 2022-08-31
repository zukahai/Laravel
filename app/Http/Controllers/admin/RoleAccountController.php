<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleAccountRequest;
use App\Http\Requests\UpdateRoleAccountRequest;
use App\Models\RoleAccount;
use App\Http\Services\RoleAccountService;
use App\Http\Services\RoleService;

class RoleAccountController extends Controller
{

    public function __construct(RoleAccountService $roleAccountService, RoleService $roleService)
    {
        $this->roleAccountService = $roleAccountService;
        $this->roleService = $roleService;
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

    public function store(StoreRoleAccountRequest $request)
    {
        //
    }

    public function show(RoleAccount $roleAccount)
    {
        //
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
}
