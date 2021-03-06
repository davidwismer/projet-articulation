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

              //création d'une table pivot filiere_module avec les colonnes inscrites dans la modélisation ainsi que les clés étrangères
    public function up()
    {

        Schema::create('filiere_module', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('filiere_id')->unsigned();
            $table->foreign('filiere_id')
                ->references('id')
                ->on('filieres')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filiere_module');
    }
};
