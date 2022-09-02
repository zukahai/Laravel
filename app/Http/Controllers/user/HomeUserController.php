<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public $data = [];

    public function index() {;
        return view('user.pages.index');
    }

    public function viewform() {
        return view('user.form');
    }

    public function testForm(Request $request) {
        $request->flash();
        return view('user.form');
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

    public function page($page=null) {
        if ($page == null)
            return "Khong co trang";
        else
            return "Page = ".$page;
    }

    public function view() {
        $this->data['title'] = 'HaiZuka';
        return view('user/view', $this->data);
    }
}
