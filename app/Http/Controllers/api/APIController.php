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

    public function bank() {
        $response = Http::post('https://api.web2m.com/historyapiacb/Zuka030203/5563331/E9D41AE0-E4EB-FA87-66C1-6C1188D2931C')->json();
        return $response['transactions'][0]['description'];
    }

}
