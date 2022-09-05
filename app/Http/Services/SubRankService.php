<?php

namespace App\Http\Services;


use App\Models\SubRank;
use DB;

class SubRankService
{
    public function __construct(SubRank $subRank)
    {
        $this->subRank = $subRank;
    }

    public function getAll() {
        return $this->subRank->orderBy('value','desc')->paginate();
    }

    public function delete($id) {
        $subRank = $this->subRank->find($id);
        DB::update('UPDATE sub_ranks SET value = value - 1 WHERE value > '.$subRank->value);
        $subRank->delete();
    }

    public function update($id, $data) {
        $this->subRank->where('id', $id)->update($data);
        return $this->subRank->find($id);
    }

    public function create($data) {
        $subRank = $data;
        $subRank->save();
    }

    public function updateValue($value){
        DB::update('UPDATE sub_ranks SET value = value + 1 WHERE value >= '.$value);
    }


    public function find($id) {
        return $this->subRank->find($id);
    }


    public function paginate($limit, $keywords){
        $subRank = $this->subRank;
        $subRank = $subRank->orderBy('value','desc');
        if (!empty($keywords)) {
            $subRank->where('sub_rank_name', 'like', '%'. $keywords.'%');
        }
        return $subRank->paginate($limit)->withQueryString();
    }

}
