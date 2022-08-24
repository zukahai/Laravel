<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index() {
        $abc = "Hai";
        return view('user.index', compact('abc'));
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
            echo $path;
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
}
