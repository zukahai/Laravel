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
        $account = $this->account->find($id);
        $account->update($data);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }


}
