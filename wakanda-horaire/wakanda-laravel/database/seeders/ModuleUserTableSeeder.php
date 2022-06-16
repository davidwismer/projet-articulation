<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('module_user')->delete();

        $users = DB::select('SELECT * FROM users');
        $modules = DB::select('SELECT * FROM modules');

        foreach($users as $user){
            //Que si c'est un étudiant
            if($user->role_id == 3){
                foreach($modules as $module){
                    //Si la filière est la même pour le module et le user
                    $FiliereModule = DB::table('filiere_module')->where('module_id', '=', $module->id)->first();
                    if($user->filiere_id == $FiliereModule->filiere_id){
                        DB::table('module_user')->insert([
                            'isValid' => rand(0,1),
                            'module_id' => $module->id,
                            'user_id' => $user->id
                        ]);
                    }
                }
            }
        }
    }
}
