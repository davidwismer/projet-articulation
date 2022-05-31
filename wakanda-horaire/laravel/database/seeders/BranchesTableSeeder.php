<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->delete();

        //IngeMedia
        $csvFile = fopen(base_path("database/data/branche.csv"), "r");

        $firstline = true;
        $id = 1;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                DB::table('branches')->insert([
                    'id' => $id,
                    "dimin" => $data['0'],
                    "module_id" => $data['1'],
                    "coefficient" => $data['4'],
                    "nom" => $data['2'],
                    'description' => 'blab lablab lablabla balblabalba lbalab',
                    'annee' => 2021,
                    "anneeFormation" => $data['3']
                ]);
            }
            $id++;
            $firstline = false;
        }

        fclose($csvFile);
    }
}
