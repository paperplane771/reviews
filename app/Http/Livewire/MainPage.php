<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Review;
use Dadata\DadataClient;
use Illuminate\Http\Request;
use Livewire\Component;

class MainPage extends Component
{
    public function guessCity($request)
    {
        $ip = $request->ip();
        $token = "1dbfa6485e5afa471350fd395ae6fae34a3345ef";
        $dadata = new DadataClient($token, null);
        $result = $dadata->iplocate('$ip');
        return $result;
    }

    public function render(Request $request)
    {
        $cityFromGeoip = $this->guessCity($request);
        if (!$request->session()->has('city')) {
            if (!$cityFromGeoip) {
                $city = 'мы не смогли определить';
            } else {
                $city = $cityFromGeoip['data']['city'];
                $request->session()->put(['city' => $city]);
            }
        }
        //@первоначальное решение
//        $query = Review::with(['city' => function ($query) {
//            $query->orderByDesc('name')->where('name', '=', session('city'));
//        }],['user' => function ($query) {
//            $query->byUser();
//        }])->get();
//        $reviews = $query->where('city.name', '=', session('city'));

        $city = City::where('name', session('city'))->first();
        $reviews = Review::where('city_id', '=', $city->id)->orderBy('title','asc')->get();
        
        return view('livewire.main-page', ['city' => $request->session()->get('city'), 'reviews' => $reviews]);
    }
}
