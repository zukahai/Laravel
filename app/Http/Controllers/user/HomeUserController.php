<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Services\AccountService;
use App\Http\Services\RankService;
use App\Http\Services\RequestStaffService;
use App\Http\Services\SubRankService;
use App\Http\Services\UserService;
use App\Models\RequestStaff;
use App\User;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public $data = [];

    public function __construct(RequestStaffService $requestStaffService,
                                SubRankService $subRankService,
                                RankService $rankService,
                                AccountService $accountService, UserService $userService)
    {
        $this->requestStaffService = $requestStaffService;
        $this->subRankService = $subRankService;
        $this->rankService = $rankService;
        $this->accountService = $accountService;
        $this->userService = $userService;
    }

    public function index() {
//        dd(User::find(1));
        return view('user.pages.index');
    }

    public function formRequestStaff(){
        return view('user.pages.request_staff');
    }

    public function price(Request $request){
        $this->data['subranks'] = $this->subRankService->paginate(1000, $request->rank_id);
        $this->data['ranks'] = $this->rankService->paginate(1000, null);
        return view('user.pages.plow.price', $this->data);
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

    public function view($id = null){
         $account = $this->accountService->find($id);
         $this->data['account'] = $account;
         return view('user.pages.profile.index', $this->data);
    }

    public function edit($id = null){
        if ($id != auth()->user()->account_id)
            return redirect(route('user.profile.view', ['id'=>auth()->user()->account_id]))->with('warning', 'Bạn không có quyền chỉnh sửa profile của người khác');
        $this->data['user'] = auth()->user();
        return view('user.pages.profile.edit', $this->data);
    }

    public function solveFormEdit($id = null, Request $request) {
        $data = [];
        $user = $this->accountService->find($id)->user;
        $data['full_name'] = $user->full_name;
        $data['phone'] = $user->phone;
        $data['email'] = $user->email;
        $data['url_avata'] = $user->url_avata;
        $data['address'] = $user->address;
        if ($request->full_name != null)
            $data['full_name'] = $request->full_name;
        if ($request->phone != null)
            $data['phone'] = $request->phone;
        if ($request->email != null)
            $data['email'] = $request->email;
        if ($request->address != null)
            $data['address'] = $request->address;

        if ($request->hasFile('url_avata')) {
            $file = $request->url_avata;
            $path = $file->store('images');
            $file->move(public_path('images'), $path);
            $data['url_avata'] = $path;
        }

        $this->userService->update($user->id, $data);
        return redirect(route('user.profile.view', ['id'=>auth()->user()->account_id]))
            ->with('info', 'Cập nhật thành công');
    }

}
