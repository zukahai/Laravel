<?php

namespace App\Http\Services;


use App\Models\Role;
use App\Models\RoleAccount;
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

    public function create($id_account, $role_name) {
        $roleAccount = new RoleAccount();
        $roleAccount->id_account = $id_account;
        $roleAccount->id_role = $this->findByRoleName($role_name)->id;
        $roleAccount->save();
    }

    public function find($id) {
        return $this->role->find($id);
    }


    public function paginate($limit, $keywords){
        $role = $this->role;
        $role = $role->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $role->where('role_name', 'like', '%'. $keywords.'%');
            $role->orWhere('description', 'like', '%'. $keywords.'%');
        }
        return $role->paginate($limit)->withQueryString();
    }

}
