<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('absences')->delete();
        $nbUser = count(DB::select('SELECT * FROM users'));
        $nbCours = count(DB::select('SELECT * FROM cours'));
        for ($i=1; $i < 31; $i++) { 
            DB::table('absences')->insert([
                'dateDebut'=> '2020-05-10',
                'dateFin'=> '2020-05-11',
                'motif'=> 'blabla blabla balb alaboabalb',
                'isValid'=> rand(0,1),
                'user_id' => rand(1,$nbUser),
                'cour_id' => rand(1,$nbCours)
            ]);
        }
    }
}
