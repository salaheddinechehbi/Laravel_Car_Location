<?php

namespace Database\Factories;

use App\Models\Vedenge;
use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VedengeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vedenge::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_videnge' => now(),
            'km' => 5000,
            'desc' => $this->faker->paragraph(3, true),
            'car_id' => Car::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
