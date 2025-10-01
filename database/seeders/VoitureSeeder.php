<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Voiture;

class VoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $voiture = new Voiture();
            $voiture->marque = $faker->company;
            $voiture->modele = $faker->safeColorName;
            $voiture->prix = $faker->numberBetween(5000, 50000);
            $voiture->img = $faker->imageUrl($width = 640, $height = 480);
            $voiture->save();
        }
    }
}
