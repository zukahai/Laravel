<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusRequestStaffRequest;
use App\Http\Requests\UpdateStatusRequestStaffRequest;
use App\Models\StatusRequestStaff;

class StatusRequestStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreStatusRequestStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusRequestStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusRequestStaff  $statusRequestStaff
     * @return \Illuminate\Http\Response
     */
    public function show(StatusRequestStaff $statusRequestStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusRequestStaff  $statusRequestStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusRequestStaff $statusRequestStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusRequestStaffRequest  $request
     * @param  \App\Models\StatusRequestStaff  $statusRequestStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequestStaffRequest $request, StatusRequestStaff $statusRequestStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusRequestStaff  $statusRequestStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusRequestStaff $statusRequestStaff)
    {
        //
    }
}
