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

     
              //création d'une table pivot branche_user avec les colonnes inscrites dans la modélisation ainsi que les clés étrangères
    public function up()
    {
        Schema::create('branche_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('branche_id')->unsigned();
            $table->foreign('branche_id')
                ->references('id')
                ->on('branches')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('branche_user');
    }
};
