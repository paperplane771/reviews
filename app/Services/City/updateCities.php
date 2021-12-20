<?php


namespace App\Services\City;

use App\Models\City;
use Illuminate\Support\Facades\Http;

class updateCities
{
    public function update()
    {
        $data = Http::get('https://api.hh.ru/areas');
        $cities = json_decode($data->body(), true, 64);
        foreach ($cities[0]['areas'] as $region) {
            if (!$region['areas']) {
                City::updateOrCreate([
                    'name' => $region['name']
                ]);
            }
            foreach ($region['areas'] as $city) {
                City::updateOrCreate([
                    'name' => $city['name']
                ]);
            }
        }
    }
}
