<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->delete();

        //IngeMedia
        $csvFile = fopen(base_path("database/data/module.csv"), "r");

        $firstline = true;
        $id = 1;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                DB::table('modules')->insert([
                    "dimin" => $data['0'],
                    "nom" => $data['1'],
                    "annee" => 2021,
                    "nbCredits" => $data['3'],
                    "semestreFormation" => $data['2'],
                    "couleur" => $data['5']
                ]);
            }
            $id++;
            $firstline = false;
        }

        fclose($csvFile);
    }
}
