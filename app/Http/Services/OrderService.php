<?php

namespace App\Http\Services;


use App\Models\Order;
use App\Models\orderAccount;
use Cookie;

class OrderService
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getAll($sort = 'asc') {
        return $this->order->orderBy('id',$sort)->paginate();
    }

    public function delete($id) {
        $order = $this->order->find($id);
        $order->delete();
    }

    public function update($id, $data) {
        $this->order->where('id', $id)->update($data);
        return $this->order->find($id);
    }

    public function create($data) {
        $order = $data;
        $order->save();
    }


    public function find($id) {
        return $this->order->find($id);
    }


    public function paginate($limit, $keywords){
        $order = $this->order;
        $order = $order->orderBy('created_at','asc');
        if (!empty($keywords)) {
            $order->where('created_at', 'like', '%'. $keywords.'%');
        }
        return $order->paginate($limit)->withQueryString();
    }

    public function yourOrder(){
        $order = $this->order;
        $order = $order->orderBy('created_at','desc');

        $order->where('account_id','=', auth()->user()->account_id);
        return $order->paginate()->withQueryString();
    }

}
