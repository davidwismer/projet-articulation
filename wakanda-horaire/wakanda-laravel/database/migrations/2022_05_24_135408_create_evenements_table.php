<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

         //création d'une table événements avec les colonnes inscrites dans la modélisation
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre', 30);
            $table->string('description', 1000);
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('lieu');
            $table->string('lienURL');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
