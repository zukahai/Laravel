<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function showInput() {
        return view('user.pages.pthh.index');
    }

    public function output(Request $request) {
        $pthh = $request->pthh;
        $response = Http::post('https://api-balance-chemical-equations.herokuapp.com/api/v1/pthh', [
            'pthh' => $pthh,
        ])->json();
        dd($response['result']['text']);;
    }
}
