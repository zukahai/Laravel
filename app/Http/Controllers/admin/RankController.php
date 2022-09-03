<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRankRequest;
use App\Http\Requests\UpdateRankRequest;
use App\Models\Rank;

class RankController extends Controller
{

    public function index()
    {
        //
    }

    public function getForm(Request $request) {
        $allData = $request->all();
        // Kết hợp với old() để lưu dữ liệu cũ
        $request->flash();
        echo $request->file;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = $file->getclientOriginalName();
            $file->move(public_path('images'), $file_name);
            dd($file_name);
        } else {
            return "Vui long chon file";
        }

        return redirect(route('honeUser'));
    }

    public function create()
    {
        //
    }

    public function store(StoreRankRequest $request)
    {
        //
    }

    public function show(Rank $rank)
    {
        //
    }

    public function edit(Rank $rank)
    {
        //
    }

    public function update(UpdateRankRequest $request, Rank $rank)
    {
        //
    }

    public function destroy(Rank $rank)
    {
        //
    }
}
