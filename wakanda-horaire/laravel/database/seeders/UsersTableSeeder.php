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
                'filiere_id' => rand(1, 31),
                'role_id' => rand(1, 3),
                'group_id' => rand(0, 50)
            ]);
        }
    }
}
