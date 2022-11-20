<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
//    use SoftDeletes;

    protected $table = "accounts";
    protected $primarykey = 'id';
    public $timestamps = true;
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_accounts', 'id_account', 'id_role')
            ->orderBy('role_name', 'asc');
    }

    public function user(){
        return $this->hasOne(User::class, 'account_id', 'id');
    }

    public function requestStaff(){
        return $this->hasOne(RequestStaff::class, 'account_id', 'id');
    }
}
