<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Clio 4',
            'matricule' => 'A26/556546',
            'date_achat' => now(),
            'cv' => 7, // password
            'color' => 'Black',
            'categorie_id' => Categorie::all()->random()->id,
        ];
    }
}
