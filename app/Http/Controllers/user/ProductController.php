<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $data = [];
    public function home() {
        $this->data['title'] = "Sản phẩm";
        return view('user.product', $this->data);
    }
}
