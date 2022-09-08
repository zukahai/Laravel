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

    public function findByvalue($value) {
        return $this->subRank->where('value', '=', $value)->first();
    }


    public function paginate($limit, $keywords){
        $subRank = $this->subRank;
        $subRank = $subRank->orderBy('value','desc');
        if (!empty($keywords) && $keywords != 'all') {
            $subRank->where('rank_id', '=', $keywords);
        }
        return $subRank->paginate($limit)->withQueryString();
    }

    public function calulateMony($request) {
        $rank1 = $request->rank1;
        $rank2 = $request->rank2;
        $star1 = $request->star1 + 1;
        $star2 = $request->star2;

        if ($rank1 > $rank2 || (($rank1 == $rank2) && ($star1 > $star2))) {
            return ['error' => 'Rank hiện tại phải thấp hơn rank muốn cày'];
        }

        if ($star1 > $this->findByvalue($rank1)->star || $star2 > $this->findByvalue($rank2)->star) {
            return ['error' => 'Số sao không hợp lệ'];
        }

        $data = [];
        $totalMoney = 0;

        while ($rank1 <= $rank2) {
            $subRank = $this->findByvalue($rank1);
            while($star1 <= $subRank->star) {
                array_push($data, (object)[
                    'id' => $rank1,
                    'subRank' => $subRank,
                    'star' => $star1,
                ]);
                $totalMoney += $subRank->price;
                $star1++;
                if ($rank1 == $rank2 && $star1 > $star2)
                    break;
            }

            $rank1++;
            $star1 = 1;
        }
        return ['data' => $data, 'totalMoney'=>$totalMoney];
    }

}
