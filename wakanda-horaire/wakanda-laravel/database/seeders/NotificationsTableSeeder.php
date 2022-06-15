<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->delete();
        $nbUser = count(DB::select('SELECT * FROM users'));
        $nbCours = count(DB::select('SELECT * FROM cours'));
        $motif = ["Changement de salle", "Changement horaire", "Mise à jour de rendus"];


        //1ère notification
        DB::table('notifications')->insert([
            'description' => 'Le cours VenteProj est déplacé en T157',
            'motif' => $motif[0],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);


        //2ème notification
        DB::table('notifications')->insert([
            'description' => 'Le cours LabVeilleSoc du vendredi 20/06/2022 est annulé',
            'motif' => $motif[1],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);


        //3ème notification
        DB::table('notifications')->insert([
            'description' => 'Les notes de droit sont disponibles sur GAPS',
            'motif' => $motif[2],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);


        //3ème notification
        DB::table('notifications')->insert([
            'description' => 'un nouveau rendu a été ajouté pour PropVal',
            'motif' => $motif[2],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);

        //1ère notification
        DB::table('notifications')->insert([
            'description' => 'Le cours DevProdMed est déplacé en T157',
            'motif' => $motif[0],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);


        //1ère notification
        DB::table('notifications')->insert([
            'description' => 'Le cours de droit est déplacé en T107',
            'motif' => $motif[0],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);

        //2ème notification
        DB::table('notifications')->insert([
            'description' => 'Le cours de StratMarque du 18/06/2022 est déplacé à la semaine prochaine',
            'motif' => $motif[1],
            'date' => '2022-06-' . rand(1, 30),
            'user_id' => rand(1, $nbUser),
            'cour_id' => rand(1, $nbCours),
        ]);
    }
}
