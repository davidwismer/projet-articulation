<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        for ($filiere=1; $filiere <= 31; $filiere++) { 
            $dateCrea = 1971;
            $lettreNom = chr($filiere+64);
            for ($annee=2019; $annee <= 2021; $annee++) { //Pour chaque année
                for ($nbClasse= rand(1,3); $nbClasse >= 1; $nbClasse--) { //On met un nombre aléatoire de classe jusqu'a 3
                    DB::table('groups')->insert([
                        'nom' => $lettreNom. ($annee - $dateCrea) . '-' .$nbClasse,
                        'anneeDebut' => $annee,
                        'filiere_id' => $filiere
                    ]);
                }
            }
        }
    }
}
