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
                    'description' => '',
                    'annee' => 2021,
                    "semestreFormation" => $data['3'],
                    'modalite' => 'Examen: 50%, Projet Pratique: 50%'
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
        //Ajouter la description
        $csvFileDesc = fopen(base_path("database/data/description.csv"), "r");
        $firstlineDesc = true;
        while (($dataDesc = fgetcsv($csvFileDesc, 2000, ";")) !== FALSE) {
            if (!$firstlineDesc) {
                $diminBranche = $dataDesc['0'];
                $description = $dataDesc['1'];
                DB::table('branches')->where('dimin', '=', $diminBranche)->update(['description' => $description]);
            }
            $firstlineDesc = false;
        }
        fclose($csvFileDesc);
    }
}
