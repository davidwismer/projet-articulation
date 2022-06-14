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

        for ($i = 0; $i < 20; $i++) {
            DB::table('notifications')->insert([
                'description' => 'Blabla blablabla, trop cool le changement',
                'motif' => $motif[rand(0, 2)],
                'date' => '2022-06-' . rand(1, 30),
                'user_id' => rand(1, $nbUser),
                'cour_id' => rand(1, $nbCours),
            ]);
        }
    }
}
