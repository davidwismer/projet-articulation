<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->delete();
        for ($user=1; $user <= 30 ; $user++) { 
            for ($idbranche=1; $idbranche <= 69; $idbranche++) { 
                for ($note=rand(1,3); $note >= 1; $note--) { 
                    DB::table('notes')->insert([
                        'valeur' => rand(20,60)/10,
                        'coefficient' => 1,
                        'description' => 'blablabl balbl blab lba',
                        'isExam' => rand(0,1),
                        'user_id' => $user,
                        'branche_id' => $idbranche
                    ]);
                }
            }
        }
    }
}
