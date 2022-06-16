<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrancheUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('branche_user')->delete();

        $users = DB::select('SELECT * FROM users');

        foreach ($users as $user) {
            //Avoir le semestre de formation (à ce moment c'est 2 pour les 1e, 4 pour les 2e et 6 pour les 3e)
            $class = DB::table('classes')->where('id', '=', $user->classe_id)->first();
            $classNom = $class->nom;
            $numClasse = substr($classNom, 1, 2);
            switch ($numClasse) {
                case '50':
                    $semestreFormation = 2;
                    break;
                case '49':
                    $semestreFormation = 4;
                    break;
                case '48':
                    $semestreFormation = 6;
                    break;
            }

            //Modules suivis par l'élève
            $modulesUser = DB::table('module_user')->where('user_id', '=', $user->id)->get();
            foreach ($modulesUser as $value) {
                $moduleId = $value->module_id;
                $module = DB::table('modules')->where('id', '=', $moduleId)->first();
                if ($module->semestreFormation == $semestreFormation) {
                    $branches = DB::select('SELECT * FROM branches');
                    foreach ($branches as $branche) {
                        if($branche->module_id == $moduleId){
                            DB::table('branche_user')->insert([
                                'branche_id' => $branche->id,
                                'user_id' => $user->id
                            ]);
                        }
                    }
                }
            }
        }
    }
}
