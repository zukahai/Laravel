<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
//    use SoftDeletes;

    public function accouts()
    {
        return $this->belongsToMany(Account::class, 'role_accounts', 'id_role', 'id_account');
    }
}
