<?php

namespace App\Http\Services;


use App\Models\rank;
use App\Models\rankAccount;
use Cookie;

class RankService
{
    public function __construct(Rank $rank)
    {
        $this->rank = $rank;
    }

    public function getAll($sort = 'asc') {
        return $this->rank->orderBy('id',$sort)->paginate();
    }

    public function delete($id) {
        $rank = $this->rank->find($id);
        $rank->delete();
    }

    public function update($id, $data) {
        $this->rank->where('id', $id)->update($data);
        return $this->rank->find($id);
    }

    public function create($data) {
        $rank = $data;
        $rank->save();
    }


    public function find($id) {
        return $this->rank->find($id);
    }


    public function paginate($limit, $keywords){
        $rank = $this->rank;
        $rank = $rank->orderBy('created_at','asc');
        if (!empty($keywords)) {
            $rank->where('rank_name', 'like', '%'. $keywords.'%');
        }
        return $rank->paginate($limit)->withQueryString();
    }

}
