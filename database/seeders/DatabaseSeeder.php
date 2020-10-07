<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Fonction;
use App\Models\Client;
use App\Models\Car;
use App\Models\Vedenge;
use App\Models\Location;
use App\Models\Categorie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Fonction::factory(5)->create();
        User::factory(8)->create();
        Categorie::factory(5)->create();
        Car::factory(20)->create();
        Client::factory(20)->create();
        Location::factory(20)->create();
        Vedenge::factory(10)->create();
    }
}
