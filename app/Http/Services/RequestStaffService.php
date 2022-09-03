<?php

namespace App\Http\Services;


use App\Models\RequestStaff;
use Cookie;

class RequestStaffService
{
    public function __construct(RequestStaff $requestStaff)
    {
        $this->requestStaff = $requestStaff;
    }

    public function getAll() {
        return $this->requestStaff->orderBy('created_at','desc')->get();
    }

    public function paginate($limit, $keywords){
        $requestStaff = $this->requestStaff;
        $requestStaff = $requestStaff->orderBy('created_at','desc');
        if (!empty($keywords)) {
            $requestStaff->where('id', 'like', '%'. $keywords.'%');
            $requestStaff->orWhere('fullname', 'like', '%'. $keywords.'%');
            $requestStaff->orWhere('created_at', 'like', '%'. $keywords.'%');
        }
        return $requestStaff->paginate($limit)->withQueryString();
    }

    public function delete($id) {
        $requestStaff = $this->requestStaff->find($id);
        $requestStaff->delete();
    }

    public function update($id, $data) {
        $this->requestStaff->where('id', $id)->update($data);
        return $this->requestStaff->find($id);
    }

    public function add($data) {
        $account = $data;
        $account->save();
    }

    public function find($id) {
        return $this->requestStaff->find($id);
    }
}
