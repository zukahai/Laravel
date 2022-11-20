<?php

namespace App\Http\Services;


use App\Models\userAccount;
use App\user;
use Cookie;

class UserService
{
    public function __construct(User $user, AccountService $accountService)
    {
        $this->user = $user;
        $this->accountService = $accountService;
    }

    public function getAll($sort = 'asc') {
        return $this->user->userBy('id',$sort)->paginate();
    }

    public function delete($id) {
        $user = $this->user->find($id);
        $user->delete();
    }

    public function update($id, $data) {
        $this->user->where('id', $id)->update($data);
        return $this->user->find($id);
    }

    public function create($data) {
        $user = $data;
        $user->save();
    }


    public function find($id) {
        return $this->user->find($id);
    }


    public function paginate($limit, $keywords){
        $user = $this->user;
        $user = $user->userBy('created_at','asc');
        if (!empty($keywords)) {
            $user->where('created_at', 'like', '%'. $keywords.'%');
        }
        return $user->paginate($limit)->withQueryString();
    }

    public function updateMoney($money){
        $currentMoney = auth()->user()->money;
        $newMoney = $currentMoney + $money;
        if ($newMoney < 0)
            return false;
        $this->update(auth()->user()->id, ['money' => $newMoney]);
        return true;
    }

    public function updateMoneyById($id, $money){
        $account = $this->accountService->find($id);
        $user = $account->user;
        $currentMoney = $user->money;
        $newMoney = $currentMoney + $money;
        if ($newMoney < 0)
            return false;
        $this->update($user->id, ['money' => $newMoney]);
        return true;
    }

}
