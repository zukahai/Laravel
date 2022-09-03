<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\RequestStaff;
use Illuminate\Http\Request;
use App\Http\Services\RequestStaffService;

class HomeUserController extends Controller
{
    public $data = [];

    public function __construct(RequestStaffService $requestStaffService)
    {
        $this->requestStaffService = $requestStaffService;
    }

    public function index() {;
        return view('user.pages.index');
    }

    public function formRequestStaff(){
        return view('user.pages.request_staff');
    }

    public function requestStaff(Request $request) {
        $request_staff = new RequestStaff();
        $request_staff->account_id = auth()->user()->account->id;
        $request_staff->fullname = $request->fullname;
        $request_staff->birthday = $request->birthday;
        $request_staff->link_facebook = $request->link_facebook;
        $request_staff->message = $request->message;
        $request_staff->status_id = 1;
        $this->requestStaffService->add($request_staff);
        return redirect()->back()->with('info', 'Đã gửi yêu cầu, vui lòng chờ');
    }

}
