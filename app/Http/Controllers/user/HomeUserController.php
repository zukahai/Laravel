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
        dd($allData);

    }

    public function page($page=null) {
        if ($page == null)
            return "Khong co trang";
        else
            return "Page = ".$page;
    }
}
