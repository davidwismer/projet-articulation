<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('filiere_module')->delete();

        $nbModules = count(DB::select('SELECT * FROM modules'));
        $INGMED = DB::table('filieres')->where('nom', '=', 'Ingénierie des Médias')->first();

        //Comme les seuls modules que l'on a à disposition dans notre table modules sont ceux d'Ingénierie des médias, on associe leur id à ceux d'IM.
        for ($module=1; $module <= $nbModules; $module++) { 
            DB::table('filiere_module')->insert([
                'module_id' => $module,
                'filiere_id' => $INGMED->id
            ]);
        }
    }
}
