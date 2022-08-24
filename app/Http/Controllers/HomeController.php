<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    // Home login
    public function index() {
        return "Trang chủ";
    }

    public function page($page=null){
        $content = "";
        if ($page == null)
            $content .= "Khong co page" . "<br>";
        else
            $content .= "Page = ".$page."<br>";
        return $content;
    }
}
