<?php

namespace App\Http\Controllers;

use Dadata\DadataClient;
use Illuminate\Http\Request;

class GeoLocTest extends Controller
{
    public function guessCity(Request $request)
    {
        $ip = $request->ip();
        $token = "1dbfa6485e5afa471350fd395ae6fae34a3345ef";
        $dadata = new DadataClient($token, null);
        $result = $dadata->iplocate($ip);
        dd($result['data']['city']);
    }
}
