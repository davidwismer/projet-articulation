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

     
              //création d'une table pivot module_user avec les colonnes inscrites dans la modélisation ainsi que les clés étrangères
    public function up()
    {
        Schema::create('module_user', function (Blueprint $table) {
            $table->id();
            $table->boolean('isValid');
            $table->timestamps();
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('module_user');
    }
};
