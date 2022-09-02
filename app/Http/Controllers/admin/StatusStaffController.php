<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusStaffRequest;
use App\Http\Requests\UpdateStatusStaffRequest;
use App\Models\StatusStaff;

class StatusStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(StatusStaff::all());
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
     * @param  \App\Http\Requests\StoreStatusStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusStaff  $statusStaff
     * @return \Illuminate\Http\Response
     */
    public function show(StatusStaff $statusStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusStaff  $statusStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusStaff $statusStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusStaffRequest  $request
     * @param  \App\Models\StatusStaff  $statusStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusStaffRequest $request, StatusStaff $statusStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusStaff  $statusStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusStaff $statusStaff)
    {
        //
    }
}
