<?php

namespace App\Http\Services;


use App\Models\Account;
use Cookie;

class AccountService
{
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getAll() {
        return $this->account->orderBy('created_at','desc')->paginate();
    }

    public function paginate($limit, $keywords){
        $user = $this->account;
        $user = $user->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $user->where('username', 'like', '%'. $keywords.'%');
            $user->orWhere('id', 'like', '%'. $keywords.'%');
            $user->orWhere('role', 'like', '%'. $keywords.'%');
            $user->orWhere('created_at', 'like', '%'. $keywords.'%');
        }
        return $user->paginate($limit)->withQueryString();
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

    public function checkLoginByCookies() {
        $user = Cookie::get('username');
        $password = Cookie::get('password');
        $account = $this->checkLogin($user, $password);
        return ($account == null) ? null : $account->role;
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
