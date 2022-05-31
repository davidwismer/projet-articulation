<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use DateTime;

class CoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cours')->delete();

        //IngMed
        $json = File::get("database/data/horaireChabloz.json");
        $cours = json_decode($json);

        foreach ($cours as $value) {
            $branche = DB::table('branches')->where('dimin', '=', $value->label)->first();
            $start = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->start)->format('Y-m-d H:i');
            $end = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->end)->format('Y-m-d H:i');
            DB::table('cours')->insert([
                'label' => $value->label,
                'room' => $value->room,
                'start' => $start,
                'end' => $end,
                'hasRendu' => rand(0, 1),
                'branche_id' => $branche->id
            ]);
        }
    }
}
