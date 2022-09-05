<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubRankRequest;
use App\Http\Requests\UpdateSubRankRequest;
use App\Http\Services\RankService;
use App\Http\Services\SubRankService;
use App\Models\SubRank;

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
        return view('admin.pages.subRank.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubRankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubRankRequest $request)
    {
        //
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
