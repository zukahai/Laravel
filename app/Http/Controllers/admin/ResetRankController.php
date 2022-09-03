<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResetRankRequest;
use App\Http\Requests\UpdateResetRankRequest;
use App\Http\Services\ResetRankService;
use App\Models\ResetRank;

class ResetRankController extends Controller
{
    public $data = [];

    public function __construct(ResetRankService $resetRankService)
    {
        $this->resetRankService = $resetRankService;
    }

    public function index()
    {
        $this->data['reset_ranks'] = $this->resetRankService->getAll();
        return view('user.pages.reset_rank', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResetRankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResetRankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResetRank  $resetRank
     * @return \Illuminate\Http\Response
     */
    public function show(ResetRank $resetRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResetRank  $resetRank
     * @return \Illuminate\Http\Response
     */
    public function edit(ResetRank $resetRank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResetRankRequest  $request
     * @param  \App\Models\ResetRank  $resetRank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResetRankRequest $request, ResetRank $resetRank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResetRank  $resetRank
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResetRank $resetRank)
    {
        //
    }
}
