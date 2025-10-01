<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Voiture;
use App\Models\Achat;

class VoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker=Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $voiture = new Voiture;
            $voiture->marque = $faker->company;
            $voiture->modele = $faker->safeColorName;
            $voiture->prix = $faker->numberBetween($min = 999, $max = 8999);
            $voiture->img = $faker->imageUrl($width = 640, $height = 480);
        }
    }
}
