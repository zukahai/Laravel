<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAccount extends Model
{
    use HasFactory;

    public function getAccount(){
        return $this->hasOne(Account::class, 'id', 'id_account');
    }

    public function role(){
        return $this->hasOne(Role::class, 'id', 'id_role');
    }

}
