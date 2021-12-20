<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(30),
            'text' => $this->faker->text(100),
            'rating' => Arr::random([1,2,3,4,5]),
            'city_id' => City::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
