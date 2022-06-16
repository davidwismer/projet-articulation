<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //créatin d'un seeder pour remplir les données dans la table
    public function run()
    {
        DB::table('filieres')->delete();

        /////////////////////////////////////////Ingénierie des médias
        DB::table('filieres')->insert([
            'nom' => 'Ingénierie des Médias',
            'orientation' => '',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);

        /////////////////////////////////////////Géomatique
        DB::table('filieres')->insert([
            'nom' => 'Géomatique',
            'orientation' => "Génie de l'environnement",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Géomatique',
            'orientation' => 'Construction et infrastructures',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Géomatique',
            'orientation' => 'Construction et infrastructures',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Géomatique',
            'orientation' => 'Géomatique et gestion du territoire',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Géomatique',
            'orientation' => 'Géomatique et gestion du territoire',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);

        ///////////////////////////////////////Informatique et systèmes de communication
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Informatique logicielle',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Informatique logicielle',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Réseaux et systèmes',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Réseaux et systèmes',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Ingénierie des données',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Ingénierie des données',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Sécurité informatique',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Sécurité informatique',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Systèmes informatiques embarqués',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Informatique et systèmes de communication',
            'orientation' => 'Systèmes informatiques embarqués',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);

        ///////////////////////////////////////////////Ingénierie et gestion industrielles
        DB::table('filieres')->insert([
            'nom' => 'Ingénierie et gestion industrielles',
            'orientation' => 'Qualité et performance industrielles',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Ingénierie et gestion industrielles',
            'orientation' => 'Logistique et organisation industrielles',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Ingénierie et gestion industrielles',
            'orientation' => 'Méthodes et procédés industriels',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);

        ////////////////////////////////////////////////////////Systèmes industriels
        DB::table('filieres')->insert([
            'nom' => 'Systèmes industriels',
            'orientation' => 'Conception',
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Systèmes industriels',
            'orientation' => 'Conception',
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);

        /////////////////////////////////////////////////////////Microtechniques
        DB::table('filieres')->insert([
            'nom' => 'Microtechniques',
            'orientation' => "Mécatronique (option)",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Microtechniques',
            'orientation' => "Mécatronique (option)",
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);

        ////////////////////////////////////////////////////////Génie électrique
        DB::table('filieres')->insert([
            'nom' => 'Génie électrique',
            'orientation' => "Electronique - Automatisation industrielle",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Génie électrique',
            'orientation' => "Electronique embarquée - Mécatronique",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Génie électrique',
            'orientation' => "Systèmes énergétiques",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Génie électrique',
            'orientation' => "Systèmes énergétiques",
            'modeFormation' => 'EE', //En emploi
            'niveau' =>  'Bachelor',
        ]);

        /////////////////////////////////////////////////////////Energie et techniques environnementales
        DB::table('filieres')->insert([
            'nom' => 'Energie et techniques environnementales',
            'orientation' => "Energétique du bâtiment",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Energie et techniques environnementales',
            'orientation' => "Thermique industrielle",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
        DB::table('filieres')->insert([
            'nom' => 'Energie et techniques environnementales',
            'orientation' => "Thermotronique",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);

        //////////////////////////////////////////////////HEG
        DB::table('filieres')->insert([
            'nom' => "Economie d'entreprise",
            'orientation' => "",
            'modeFormation' => 'TP', //Temps plein
            'niveau' =>  'Bachelor',
        ]);
    }
}
