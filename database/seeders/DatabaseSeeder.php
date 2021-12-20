<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Review;
use App\Models\User;
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
        User::factory()->count('100')->create();
        City::factory()->count('100')->create();
        Review::factory()->count('200')->create();
    }
}
