<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commentaires')->delete();
        $nbUser = count(DB::select('SELECT * FROM users'));
        $nbCours = count(DB::select('SELECT * FROM cours'));
        for ($i = 0; $i < 30; $i++) {
            DB::table('commentaires')->insert([
                'description' => 'blabla bal balbalbablalbalblab balb balblab lbalbalb',
                'user_id' => rand(1, $nbUser),
                'cour_id' => rand(1, $nbCours)
            ]);
        }
    }
}
