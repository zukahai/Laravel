<?php

namespace App\Models;

use App\Http\Services\SubRankService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function account(){
        return $this->hasOne(Account::class, 'id', 'account_id');
    }

    public function rank1(){
        return $this->hasOne(SubRank::class, 'id', 'rank1_id');
    }

    public function rank2(){
        return $this->hasOne(SubRank::class, 'id', 'rank2_id');
    }
}
