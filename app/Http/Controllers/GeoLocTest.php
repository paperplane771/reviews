<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dadata;

class GeoLocTest extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $token = "1dbfa6485e5afa471350fd395ae6fae34a3345ef";
        $dadata = new \Dadata\DadataClient($token, null);
        $result = $dadata->iplocate("5.227.125.78");
        dd($result['data']['city']);
    }
}
