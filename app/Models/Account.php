<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "accounts";
    protected $primarykey = 'id';
    public $timestamps = true;
    use HasFactory;
}
