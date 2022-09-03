<?php

namespace App\Http\Services;


use App\Models\ResetRank;

class ResetRankService
{
    public function __construct(ResetRank $resetRank)
    {
        $this->resetRank = $resetRank;
    }

    public function getAll() {
        return $this->resetRank->orderBy('id','asc')->paginate(1000);
    }

    public function delete($id) {
        $resetRank = $this->resetRank->find($id);
        $resetRank->delete();
    }

    public function update($id, $data) {
        $this->resetRank->where('id', $id)->update($data);
        return $this->resetRank->find($id);
    }

    public function create($data) {
        $resetRank = $data;
        $resetRank->save();
    }

    public function find($id) {
        return $this->resetRank->find($id);
    }

    public function paginate($limit, $keywords){
        $resetRank = $this->resetRank;
        $resetRank = $resetRank->orderBy('value','desc');
        if (!empty($keywords) && $keywords != 'all') {
            $resetRank->where('rank', '=', $keywords);
        }
        return $resetRank->paginate($limit)->withQueryString();
    }

}
