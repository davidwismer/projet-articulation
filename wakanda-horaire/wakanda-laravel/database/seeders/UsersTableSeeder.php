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

     //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('users')->delete();
        //Nombre de classes (classes) / filières
        $nbFilieres = count(DB::select('SELECT * FROM filieres'));
        $nbClasses = count(DB::select('SELECT * FROM classes'));

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
                'classe_id' => rand(1, $nbClasses)
            ]);
        }

        //Quelques utilisateurs (cas réels classee wakanda)
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
                    'classe_id' => 3
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);

        //Utilisateur prof IngMed
        DB::table('users')->insert([
            'nom' => "Doe",
            'prenom' => "John",
            'dateNaissance' =>  "1970-01-01",
            'email' => "prof@heig-vd.ch",
            'password' => Hash::make("prof"),
            'noTel' => "0782202020",
            'adresse' => "chemin des Etudes 20",
            'photo' => 'photo.jpg',
            'filiere_id' => 1,
            'role_id' => 2,
            'classe_id' => 1
        ]);

        //Utilisateur direction IngMed
        DB::table('users')->insert([
            'nom' => "Doe",
            'prenom' => "John",
            'dateNaissance' =>  "1970-01-01",
            'email' => "direction@heig-vd.ch",
            'password' => Hash::make("direction"),
            'noTel' => "0782202020",
            'adresse' => "chemin des Etudes 20",
            'photo' => 'photo.jpg',
            'filiere_id' => 1,
            'role_id' => 1,
            'classe_id' => 1
        ]);

        //Utilisateur élève IngMed M49-2
        DB::table('users')->insert([
            'nom' => "Doe",
            'prenom' => "John",
            'dateNaissance' =>  "1990-01-01",
            'email' => "eleve@heig-vd.ch",
            'password' => Hash::make("eleve"),
            'noTel' => "0782202020",
            'adresse' => "chemin des Etudes 20",
            'photo' => 'photo.jpg',
            'filiere_id' => 1,
            'role_id' => 3,
            'classe_id' => 3
        ]);
    }
}
