<?php

namespace App\Http\Services;


use App\Models\Account;
use App\Http\Services\RoleAccountService;
use Cookie;

class AccountService
{
    public function __construct(Account $account, RoleAccountService $roleAccountService)
    {
        $this->account = $account;
        $this->roleAccountService = $roleAccountService;
    }

    public function getAll() {
        return $this->account->orderBy('username','asc')->get();
    }

    public function paginate($limit, $keywords){
        $user = $this->account;
        $user = $user->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $user->where('username', 'like', '%'. $keywords.'%');
            $user->orWhere('id', 'like', '%'. $keywords.'%');
            $user->orWhere('created_at', 'like', '%'. $keywords.'%');
        }
        return $user->paginate($limit)->withQueryString();
    }

    public function delete($id) {
        $account = $this->account->find($id);
        $roleAccount = $this->roleAccountService->findByIdAccount($id);
        foreach ($roleAccount as $role_account) {
            $this->roleAccountService->delete($role_account->id);
        }
        $account->delete();
    }

    public function update($id, $data) {
        $this->account->where('id', $id)->update($data);
        return $this->account->find($id);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }

    public function find($id) {
        return $this->account->find($id);
    }

    public function checkLoginByCookies() {
        $user = Cookie::get('username');
        $password = Cookie::get('password');
        $account = $this->checkLogin($user, $password);
        return ($account == null) ? null : $this->getNameRole($account->roles);
    }

    public function getNameRole($roles) {
        $name_roles = [];
        foreach ($roles as $role) {
            array_push($name_roles, $role->role_name);
        }
        return $name_roles;
    }

    public function setCookie($username, $password) {
        Cookie::queue('username', $username, 120);
        Cookie::queue('password', $password, 120);
    }

    public function clearCookie() {
        Cookie::queue('username', null , -1);
        Cookie::queue('password', null, -1);
    }

    public function checkLogin($username, $password){
        return $this->account->where('username', $username)->where('password', $password)->first();
    }

}
