<?php

namespace App\Http\Services;


use App\Models\Account;

class AccountService
{
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getAll() {
        return $this->account->all();
    }

    public function delete($id) {
        $account = $this->account->find($id);
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


}
