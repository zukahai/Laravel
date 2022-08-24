<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct() {
        echo "Admin khoi dong";
    }

    public function index() {
        return View('admin/index');
    }
}
