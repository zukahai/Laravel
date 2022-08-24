<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public $data = [];

    public function index() {
        $this->data['abc'] = "Phan Đức Hải";
        $this->data['array'] = ['Hai'=>'Linh', 'Sy'=>'na'];
        return view('user.index', $this->data);
    }

    public function viewform() {
        return view('form');
    }

    public function getForm(Request $request) {
        $allData = $request->all();
        // Kết hợp với old() để lưu dữ liệu cũ
        $request->flash();
        echo $request->file;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $path = $file->store('images');
            dd($path);
        } else {
            return "Vui long chon file";
        }

        return view('form');
    }

    public function page($page=null) {
        if ($page == null)
            return "Khong co trang";
        else
            return "Page = ".$page;
    }

    public function view() {
        $this->data['title'] = 'HaiZula';
        return view('user/view', $this->data);
    }
}
