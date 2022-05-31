<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

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
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                $diminModule = $data['1'];
                $module = DB::table('modules')->where('dimin', '=', $diminModule)->first();
                DB::table('branches')->insert([
                    "dimin" => $data['0'],
                    "module_id" => $module->id,
                    "coefficient" => $data['4'],
                    "nom" => $data['2'],
                    'description' => 'blab lablab lablabla balblabalba lbalab',
                    'annee' => 2021,
                    "anneeFormation" => $data['3']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
