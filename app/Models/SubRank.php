<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubRank extends Model
{
    use HasFactory;

    public function rank(){
        return $this->hasOne(Rank::class, 'id', 'rank_id');
    }
}
