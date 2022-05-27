<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        ///////////////////////////////Direction
        DB::table('roles')->insert([
            'titre' => 'Direction'
        ]);

        ///////////////////////////////Professeur
        DB::table('roles')->insert([
            'titre' => 'Professeur'
        ]);

        ///////////////////////////////Etudiant
        DB::table('roles')->insert([
            'titre' => 'Étudiant'
        ]);
    }
}
