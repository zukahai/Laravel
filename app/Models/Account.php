<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
