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
    public function run()
    {
        DB::table('branche_user')->delete();

        $users = DB::select('SELECT * FROM users');

        foreach ($users as $user) {
            //Avoir l'annee de formation de l'élève
            $class = DB::table('groups')->where('id', '=', $user->group_id)->first();
            $classNom = $class->nom;
            $numClasse = substr($classNom, 1, 2);
            switch ($numClasse) {
                case '50':
                    $anneeFormation = 1;
                    break;
                case '49':
                    $anneeFormation = 2;
                    break;
                case '48':
                    $anneeFormation = 3;
                    break;
            }

            //Modules suivis par l'élève
            $modulesUser = DB::table('module_user')->where('user_id', '=', $user->id)->get();
            foreach ($modulesUser as $value) {
                $moduleId = $value->module_id;
                $module = DB::table('modules')->where('id', '=', $moduleId)->first();
                if ($module->anneeFormation == $anneeFormation) {
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
