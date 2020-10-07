<?php

namespace Database\Factories;

use App\Models\Fonction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FonctionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fonction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
        ];
    }
}
