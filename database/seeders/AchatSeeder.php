<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Achat;
use App\Models\Utilisateur;
use App\Models\Voiture;

class AchatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();

        $achat = new Achat;
        $utilisateurs = Utilisateur::all()->pluck('id')->toArray();
        $voitures = Voiture::all()->pluck('id')->toArray();
    }
}
