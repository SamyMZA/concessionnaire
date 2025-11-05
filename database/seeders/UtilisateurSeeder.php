<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Utilisateur;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $utilisateur = new Utilisateur;
            $utilisateur->nom = $faker->firstName();
            $utilisateur->mdp = $faker->password();
            $utilisateur->save();
        }
    }
}
