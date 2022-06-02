<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        //Nombre de groups (classes) / filières
        $nbFilieres = count(DB::select('SELECT * FROM filieres'));
        $nbGroups = count(DB::select('SELECT * FROM groups'));

        //Créer 30 utilisateurs randoms
        for ($i = 1; $i <= 30; $i++) {
            DB::table('users')->insert([
                'nom' => 'Nom' . $i,
                'prenom' => 'Prenom' . $i,
                'dateNaissance' =>  '1999-02-12',
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('password' . $i),
                'noTel' => '0788457328',
                'adresse' => 'chemin de blablabl ' . $i,
                'photo' => 'photo' . $i . '.jpg',
                'filiere_id' => rand(1, $nbFilieres),
                'role_id' => rand(1, 3),
                'group_id' => rand(1, $nbGroups)
            ]);
        }

        //Quelques utilisateurs (cas réels groupe wakanda)
        $csvFile = fopen(base_path("database/data/usersWakanda.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE) {
            if (!$firstline) {
                DB::table('users')->insert([
                    'nom' => $data['0'],
                    'prenom' => $data['1'],
                    'dateNaissance' =>  $data['2'],
                    'email' => $data['3'],
                    'password' => Hash::make($data['1']),
                    'noTel' => $data['4'],
                    'adresse' => $data['5'],
                    'photo' => 'photo.jpg',
                    'filiere_id' => 1,
                    'role_id' => 3,
                    'group_id' => 3
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
