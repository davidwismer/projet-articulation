<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvenementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evenements')->delete();

        //1er event
        DB::table('evenements')->insert([
            'titre' => 'Numerik Games Festival 2022',
            'description' => "Numerik Games Festival est un festival tout public dédié à l'art numérique qui se déroule à Yverdon-les-Bains se déroulera du 26 au 28 août 2022.",
            'dateDebut' => '2022-08-26',
            'dateFin' => '2022-08-29',
            'lieu' => "Centre-ville d'Yverdon-les-Bains",
            'lienURL' => 'https://www.numerik-games.ch/',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);

        //2e event
        DB::table('evenements')->insert([
            'titre' => 'Colloque SIA-REMU',
            'description' => "Titre du workshop : \"Artificial Intelligence in Acute Medecine - From theory to applications\"",
            'dateDebut' => '2022-11-25',
            'dateFin' => '2022-11-26',
            'lieu' => "EXPLORiT",
            'lienURL' => 'https://heig-vd.ch/evenements/2022/11/25/default-calendar/colloque-sia-remu-robert-stephan',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);

        //3e event
        DB::table('evenements')->insert([
            'titre' => 'Management de demain dans le secteur de la santé. Quelles compétences ?',
            'description' => "Cette matinée d’étude a pour but de rassembler les personnes et organisations qui nous ont accompagnées dans le développement de nos activités d’enseignement et de Ra&D. Ce sera l’occasion d’échanger ensemble sur l’évolution des métiers et des compétences en management dans le secteur de la santé. Cette démarche nous permettra de façonner nos enseignements, de dynamiser nos formations et de nous assurer que nos étudiant·e·s et Alumni connaissent et savent apprivoiser les enjeux du secteur.",
            'dateDebut' => '2022-06-23',
            'dateFin' => '2022-06-23',
            'lieu' => "HEIG-VD, Avenue des Sports 20, 1400 Yverdon-les-Bains
            Salle R102, à côté de la réception",
            'lienURL' => 'https://heig-vd.ch/campus/vie-sur-le-campus/manifestations/management-de-demain-dans-le-secteur-de-la-sante',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);

        //4e event
        DB::table('evenements')->insert([
            'titre' => 'Conférence « Faut-il avoir peur des émotions au travail ? »',
            'description' => "Dans le cadre du MAS en Développement humain dans les organisations, une conférence, intitulée « Faut-il avoir peur des émotions au travail ? » aura lieu le mercredi 29 juin 2022 au Casino de Montbenon à Lausanne.",
            'dateDebut' => '2022-06-29',
            'dateFin' => '2022-06-30',
            'lieu' => "Casino de Montbenon
            Salle des fêtes
            Allée Ernest Ansermet 3
            1003 Lausanne",
            'lienURL' => 'https://heig-vd.ch/campus/vie-sur-le-campus/manifestations/dho-2022',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);

        //5e event
        DB::table('evenements')->insert([
            'titre' => 'Festival de la loutre 2022',
            'description' => "Le festival de la loutre rassemble chaque année les enthousiastes de cet animal formidable qu'est la loutre. Des stands et des bars au thème de la loutre sont ouverts toute la semaine dans la vieille ville d'Yverdon.",
            'dateDebut' => '2022-07-20',
            'dateFin' => '2022-07-27',
            'lieu' => "Vieille ville d'Yverdon",
            'lienURL' => 'https://www.loutre-festival.ch/',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);

        //5e event
        DB::table('evenements')->insert([
            'titre' => "Barbecue de fin d'année",
            'description' => "Retrouvons nous tous au bord du lac d'Yverdon pour fêter entre COMEM l'arrivée de la fin d'année.",
            'dateDebut' => '2022-06-09',
            'dateFin' => '2022-06-09',
            'lieu' => "Bord du lac d'Yverdon",
            'lienURL' => '',
            'image' => "https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg"
        ]);
    }
}
