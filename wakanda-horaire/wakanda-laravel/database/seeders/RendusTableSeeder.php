<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rendus')->delete();
        $nbUser = count(DB::select('SELECT * FROM users'));
        $nbCours = count(DB::select('SELECT * FROM cours'));
        for ($i = 1; $i <= 10; $i++) {
            DB::table('rendus')->insert([
                'consignes' => 'Choisissez un ou plusieurs jeux de données qui vous inspirent et qui feront partie de votre visualisation. 
                Vous devrez raconter une histoire et les coups de cœur sont ceux qui marchent le mieux !
                Créer un repo github où vous hébergerez votre visualisation et transmettez-moi lurl
                A la racine du repo, créez un README.md où vous traitez les questions suivantes :
                Contexte : doù viennent les données, qui les a créées et dans quel contexte',
                'date' => '2022-06-' . $i,
                'user_id' => rand(1, $nbUser),
                'cour_id' => rand(1, $nbCours)
            ]);
        }

        DB::table('rendus')->insert([
            'consignes' => 'Projet Articulation rendu du rapport à 12:00',
            'date' => '2022-06-16',
            'user_id' => rand(1, $nbUser),
            'cour_id' => 158
        ]);

        DB::table('rendus')->insert([
            'consignes' => 'Projet Articulation rendu du rapport à 12:00',
            'date' => '2022-06-16',
            'user_id' => rand(1, $nbUser),
            'cour_id' => 340
        ]);
    }
}
