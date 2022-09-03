<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestStaffRequest;
use App\Http\Requests\UpdateRequestStaffRequest;
use App\Http\Services\RequestStaffService;
use App\Models\RequestStaff;
use Illuminate\Http\Request;

class RequestStaffController extends Controller
{
    public $data = [];
    protected $limit = 10;

    public function __construct(RequestStaff $requestStaff, RequestStaffService $requestStaffService)
    {
        $this->requestStaff = $requestStaff;
        $this->requestStaffService = $requestStaffService;
    }

    public function index(Request $request)
    {
        $keywords = $request->keywords;
        $this->data['requets'] = $this->requestStaffService->paginate($this->limit, $keywords);
        return view('admin.pages.staff.list_request_staff', $this->data);
    }

    public function delete($id) {
        $this->requestStaffService->delete($id);
        return $id;
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
     * @param  \App\Http\Requests\StoreRequestStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestStaff  $requestStaff
     * @return \Illuminate\Http\Response
     */
    public function show(RequestStaff $requestStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestStaff  $requestStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestStaff $requestStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestStaffRequest  $request
     * @param  \App\Models\RequestStaff  $requestStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestStaffRequest $request, RequestStaff $requestStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestStaff  $requestStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestStaff $requestStaff)
    {
        //
    }
}
