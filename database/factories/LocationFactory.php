<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Car;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'duree' => 6,
            'date_debut' => now(),
            'date_fin' => now(),
            'desc' => $this->faker->paragraph(3, true),
            'car_id' => Car::all()->random()->id,
            'client_id' => Client::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
