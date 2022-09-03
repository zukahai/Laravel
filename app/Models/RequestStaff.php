<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStaff extends Model
{
    use HasFactory;

    public function status(){
        return $this->hasOne(StatusRequestStaff::class, 'id', 'status_id');
    }

    public function account(){
        return $this->hasOne(Account::class, 'id', 'account_id');
    }
}
