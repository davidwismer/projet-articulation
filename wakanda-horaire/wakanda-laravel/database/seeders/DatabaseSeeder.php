<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EvenementsTableSeeder::class);
        $this->call(FilieresTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(FiliereModuleTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ModuleUserTableSeeder::class);
        $this->call(BrancheUserTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        $this->call(CoursTableSeeder::class);
        $this->call(CommentairesTableSeeder::class);
        $this->call(AbsencesTableSeeder::class);
        $this->call(RendusTableSeeder::class);
    }
}
