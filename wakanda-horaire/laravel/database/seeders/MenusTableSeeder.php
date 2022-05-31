<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->delete();
        $oldDate   = "2020-06-06";

        //Premier menu
        DB::table('menus')->insert([
            'entree' => 'Choux au saumon',
            'plat' => 'Steak tartare',
            'dessert' => 'Cake au chocolat',
            'date' => $oldDate,
            'prix' => '9.80'
        ]);

        //Deuxieme menu
        DB::table('menus')->insert([
            'entree' => 'Vol au vent aux champignons',
            'plat' => 'Salade façon Caésar',
            'dessert' => 'Salade de fruit',
            'date' => date("Y-m-d", strtotime($oldDate . '+ 1 days')),
            'prix' => '9.80'
        ]);

        //Troisieme menu
        DB::table('menus')->insert([
            'entree' => 'Toasts à la truite fumée',
            'plat' => 'Hamburger maison',
            'dessert' => 'Tarte à la crème',
            'date' => date("Y-m-d", strtotime($oldDate . '+ 2 days')),
            'prix' => '9.80'
        ]);

        //Quatrième menu
        DB::table('menus')->insert([
            'entree' => 'Champignons farcis',
            'plat' => 'Lasagnes à la bolognaise',
            'dessert' => 'Fondant au chocolat',
            'date' => date("Y-m-d", strtotime($oldDate . '+ 3 days')),
            'prix' => '9.80'
        ]);

        //Cinquième menu
        DB::table('menus')->insert([
            'entree' => 'Crumble de légumes',
            'plat' => 'Filet de saumon',
            'dessert' => 'Carac',
            'date' => date("Y-m-d", strtotime($oldDate . '+ 4 days')),
            'prix' => '9.80'
        ]);
    }
}
