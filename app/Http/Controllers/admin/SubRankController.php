<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubRankRequest;
use App\Http\Requests\UpdateSubRankRequest;
use App\Http\Services\RankService;
use App\Http\Services\SubRankService;
use App\Models\SubRank;
use Illuminate\Http\Request;

class SubRankController extends Controller
{
    protected $data = [];
    public $limit = 100;

    public function __construct(SubRankService $subRankService, RankService $rankService)
    {
        $this->subRankService = $subRankService;
        $this->rankService = $rankService;
    }

    public function index()
    {
        $this->data['subranks'] = $this->subRankService->paginate($this->limit, null);
        return view('admin.pages.subRank.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['ranks'] = $this->rankService->getAll();
        $this->data['subRanks'] = $this->subRankService->getAll();
        return view('admin.pages.subRank.create', $this->data);
    }

    public function solveFormCreate(Request $request) {
//        dd($request->all());
        $subRank = new SubRank();
        $subRank->sub_rank_name = $request->sub_rank_name;
        $subRank->rank_id = $request->rank_id;
        $subRank->price = $request->price;
        $subRank->star = $request->star;
        $subRank->value = $request->value + 1;
        $this->subRankService->updateValue($subRank->value);
        $this->subRankService->create($subRank);
        return redirect(route('admin.subrank.index'))->with('info', 'Thêm thành công');
    }


    public function delete($id)
    {
        $this->subRankService->delete($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubRank  $subRank
     * @return \Illuminate\Http\Response
     */
    public function show(SubRank $subRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubRank  $subRank
     * @return \Illuminate\Http\Response
     */
    public function edit(SubRank $subRank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubRankRequest  $request
     * @param  \App\Models\SubRank  $subRank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubRankRequest $request, SubRank $subRank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubRank  $subRank
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubRank $subRank)
    {
        //
    }
}
