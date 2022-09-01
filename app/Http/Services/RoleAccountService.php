<?php

namespace App\Http\Services;


use App\Models\Account;
use App\Models\RoleAccount;
use Cookie;

class RoleAccountService
{
    public function __construct(RoleAccount $roleAccount)
    {
        $this->roleAccount = $roleAccount;
    }

    public function getAll() {
        return $this->roleAccount->orderBy('created_at','desc')->paginate();
    }


    public function delete($id) {
        $roleAccount = $this->roleAccount->find($id);
        $roleAccount->delete();
    }

    public function update($id, $data) {

        $this->roleAccount->where('id', $id)->update($data);
        return $this->roleAccount->find($id);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }

    public function find($id) {
        return $this->roleAccount->find($id);
    }

    public function findByIdAccount($id_account) {
        return $this->roleAccount->where('id_account', '=', $id_account)->get();
    }

    public function findByIdRole($id_role) {
        $accounts = $this->roleAccount;
        $accounts = $accounts->where('id_role', '=', $id_role);
        $accounts = $accounts->paginate();
        return $accounts;
    }
}
