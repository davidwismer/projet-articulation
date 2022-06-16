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

     
    //création d'une table notifications avec les colonnes inscrites dans la modélisation ainsi que les clés étrangères
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('motif');
            $table->date('date');

             //Liens
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('restrict')
                 ->onUpdate('restrict');
 
             $table->integer('cour_id')->unsigned();
             $table->foreign('cour_id')
                 ->references('id')
                 ->on('cours')
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
        Schema::dropIfExists('notifications');
    }
};
