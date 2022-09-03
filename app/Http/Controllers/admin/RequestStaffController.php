<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestStaffRequest;
use App\Http\Requests\UpdateRequestStaffRequest;
use App\Http\Services\RequestStaffService;
use App\Http\Services\RoleService;
use App\Http\Services\StaffService;
use App\Models\RequestStaff;
use Illuminate\Http\Request;

class RequestStaffController extends Controller
{
    public $data = [];
    protected $limit = 10;

    public function __construct(RequestStaff $requestStaff,
                                RequestStaffService $requestStaffService,
                                StaffService $staffService,
                                RoleService $roleService)
    {
        $this->requestStaff = $requestStaff;
        $this->requestStaffService = $requestStaffService;
        $this->staffService = $staffService;
        $this->roleService = $roleService;
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

    public function accept($id)
    {
        $requestStaff = $this->requestStaffService->find($id);
        $this->requestStaffService->update($requestStaff->id, ['status_id'=>2]);
        $this->staffService->copyFromRequestStaff($requestStaff);
        $this->roleService->create($requestStaff->account_id, 'staff');
        return redirect(route('admin.account.requestStaff'))->with('info', 'Đã thêm '.$requestStaff->account->username.' là nhân viên');
    }

    public function create()
    {

    }

    public function store(StoreRequestStaffRequest $request)
    {

    }

    public function show(RequestStaff $requestStaff)
    {

    }

    public function edit(RequestStaff $requestStaff)
    {

    }

    public function update(UpdateRequestStaffRequest $request, RequestStaff $requestStaff)
    {

    }

    public function destroy(RequestStaff $requestStaff)
    {

    }
}
