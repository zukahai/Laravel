<?php

namespace App\Http\Services;


use App\Models\Payment;
use App\Http\Services\RolepaymentService;
use Cookie;

class PaymentService
{
    public function __construct(Payment  $payment)
    {
        $this->payment = $payment;
    }

    public function getAll() {
        return $this->payment->orderBy('created_at','asc')->get();
    }

    public function paginate($limit, $keywords){
        $user = $this->payment;
        $user = $user->orderBy('created_at','desc');
        if (!empty($keywords)) {

        }
        return $user->paginate($limit)->withQueryString();
    }

    public function delete($id) {
        $payment = $this->payment->find($id);
        $payment->delete();
    }

    public function update($id, $data) {
        $this->payment->where('id', $id)->update($data);
        return $this->payment->find($id);
    }

    public function add($data) {
        $payment = $data;
        $payment->save();
    }

    public function find($id) {
        return $this->payment->find($id);
    }

}
