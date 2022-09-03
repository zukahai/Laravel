<?php

namespace App\Http\Services;


use App\Models\staff;
use Cookie;

class StaffService
{
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function getAll() {
        return $this->staff->orderBy('created_at','desc')->get();
    }

    public function paginate($limit, $keywords){
        $staff = $this->staff;
        $staff = $staff->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $staff->where('id', 'like', '%'. $keywords.'%');
            $staff->orWhere('fullname', 'like', '%'. $keywords.'%');
            $staff->orWhere('created_at', 'like', '%'. $keywords.'%');
        }
        return $staff->paginate($limit)->withQueryString();
    }

    public function delete($id) {
        $staff = $this->staff->find($id);
        $staff->delete();
    }

    public function update($id, $data) {
        $this->staff->where('id', $id)->update($data);
        return $this->staff->find($id);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }

    public function copyFromRequestStaff($requestStaff) {
        $staff = new Staff();
        $staff->fullname = $requestStaff->fullname;
        $staff->birthday = $requestStaff->birthday;
        $staff->account_id = $requestStaff->account_id;
        $staff->link_facebook = $requestStaff->link_facebook;
        $staff->status_id = 1;
        $staff->save();
    }

    public function find($id) {
        return $this->staff->find($id);
    }
}
