<?php

namespace App\Http\Services;


use App\Models\Role;
use Cookie;

class RoleService
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function findByRoleName($roleName){
        return $this->role->where('role_name', '=', $roleName)->first();
    }

    public function getAll() {
        return $this->role->orderBy('id','asc')->paginate();
    }

    public function delete($id) {
        $role = $this->role->find($id);
        $role->delete();
    }

    public function update($id, $data) {

        $this->role->where('id', $id)->update($data);
        return $this->role->find($id);
    }

    public function add($data) {
        $role = $data;
        $role->save();
    }

    public function find($id) {
        return $this->role->find($id);
    }


//    public function setCookie($username, $password) {
//        Cookie::queue('username', $username, 120);
//        Cookie::queue('password', $password, 120);
//    }
//
//    public function clearCookie() {
//        Cookie::queue('username', null , -1);
//        Cookie::queue('password', null, -1);
//    }
//
//    public function checkLogin($username, $password){
//        return $this->account->where('username', $username)->where('password', $password)->first();
//    }

}
