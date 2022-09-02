<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct() {
        echo "Admin khoi dong<br>";
    }

    public function index() {
        return view('admin.pages.account.index');
    }
}
