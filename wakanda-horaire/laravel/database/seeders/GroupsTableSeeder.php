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

        //Créer des classes aléatoires pour les filières autres que Ingénierie des médias (manque d'info) mais vraies classes pour les IM
        for ($filiere = 1; $filiere <= 31; $filiere++) {
            $dateCrea = 1971;
            $lettreNom = chr($filiere + 64);
            //Pour Ingénierie des médias on veut pas d'aléatoire
            if ($filiere == 1) {
                for ($annee = 2019; $annee <= 2021; $annee++) {
                    switch ($annee) {
                        case 2019:
                            DB::table('groups')->insert([
                                'nom' => 'M48-1',
                                'anneeDebut' => $annee,
                                'filiere_id' => $filiere
                            ]);
                            break;
                        case 2020:
                            for ($i=1; $i <= 2; $i++) { 
                                DB::table('groups')->insert([
                                    'nom' => 'M49-' . $i,
                                    'anneeDebut' => $annee,
                                    'filiere_id' => $filiere
                                ]);
                            }
                            break;
                        case 2021:
                            for ($i=1; $i <= 3; $i++) { 
                                DB::table('groups')->insert([
                                    'nom' => 'M50-' . $i,
                                    'anneeDebut' => $annee,
                                    'filiere_id' => $filiere
                                ]);
                            }
                            break;
                    }
                }
            } else {
                //On ne veut pas que plusieur filière aie le même nom de classe
                if ($lettreNom == 'M') $lettreNom = 'A';
                for ($annee = 2019; $annee <= 2021; $annee++) { //Pour chaque année
                    for ($nbClasse = rand(1, 3); $nbClasse >= 1; $nbClasse--) { //On met un nombre aléatoire de classe jusqu'a 3
                        DB::table('groups')->insert([
                            'nom' => $lettreNom . ($annee - $dateCrea) . '-' . $nbClasse,
                            'anneeDebut' => $annee,
                            'filiere_id' => $filiere
                        ]);
                    }
                }
            }
        }
    }
}
