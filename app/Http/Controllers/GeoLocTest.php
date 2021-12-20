<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class GeoLocTest extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $data = Location::get('5.227.125.78');
        dd($data);
    }
}
