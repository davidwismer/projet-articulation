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

     //créatin d'un seeder pour remplir les données dans la table (Le seul cas réel et complet est celui pour les cours de la M49-2 (démo))
    public function run()
    {
        DB::table('cours')->delete();

        //IngMed
        $json = File::get("database/data/horaireChabloz.json");
        $cours = json_decode($json);

        foreach ($cours as $value) {
            $branche = DB::table('branches')->where('dimin', '=', $value->label)->first();
            //Gérer la classe avec l'id
            $classe = DB::table('classes')->where('nom', '=', $value->class)->first();
            //ModuleId
            $module = DB::table('modules')->where('id', '=', $branche->module_id)->first();
            if ($value->class != 'M49-2') {
                //Gérer les dates des cours
                $start = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->start)->format('Y-m-d H:i:s');
                $end = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->end)->format('Y-m-d H:i:s');
                $newStart = date('Y-m-d H:i:s', strtotime($start . ' + 2 hours'));
                $newEnd = date('Y-m-d H:i:s', strtotime($end . ' + 2 hours'));
                $periodStart = 0;
                //Peupler la table cours
                DB::table('cours')->insert([
                    'label' => $value->label,
                    'room' => $value->room,
                    'start' => $newStart,
                    'end' => $newEnd,
                    'hasRendu' => rand(0, 1),
                    'periodeStart' => $periodStart,
                    'periodeDuree' => 4,
                    'branche_id' => $branche->id,
                    'classe_id' => $classe->id,
                    'module_id' => $module->id,
                ]);
            } else {
                //Gérer les dates des cours
                $start = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->start)->format('Y-m-d H:i:s');
                $end = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $value->end)->format('Y-m-d H:i:s');
                $timeStart = date('H:i:s', strToTime($value->start));
                $dateStart = date('Y:m:d', strToTime($value->start));
                //Si le matin dire que le début est à 8:30
                if(intval(date('H', strToTime($timeStart))) < 10){
                    DB::table('cours')->insert([
                        'label' => $value->label,
                        'room' => $value->room,
                        'start' => $dateStart . " 08:30:00",
                        'end' => $dateStart . " 12:00:00",
                        'hasRendu' => rand(0, 1),
                        'periodeStart' => 1,
                        'periodeDuree' => 4,
                        'branche_id' => $branche->id,
                        'classe_id' => $classe->id,
                        'module_id' => $module->id,
                    ]);
                }else{ //Sinon c'est l'aprem -> 16:30
                    DB::table('cours')->insert([
                        'label' => $value->label,
                        'room' => $value->room,
                        'start' => $dateStart . " 13:15:00",
                        'end' => $dateStart . " 16:30:00",
                        'hasRendu' => rand(0, 1),
                        'periodeStart' => 6,
                        'periodeDuree' => 4,
                        'branche_id' => $branche->id,
                        'classe_id' => $classe->id,
                        'module_id' => $module->id,
                    ]);
                }
            }
        }
    }
}
