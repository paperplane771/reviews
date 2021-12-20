<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use App\Services\City\updateCities;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count('250')->create();
        $cities = new updateCities();
        $cities->update();
        Review::factory()->count('1000')->create();
    }
}
