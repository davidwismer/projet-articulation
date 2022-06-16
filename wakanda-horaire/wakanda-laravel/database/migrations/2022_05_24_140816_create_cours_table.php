<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

              //création d'une table cours avec les colonnes inscrites dans la modélisation ainsi que les clés étrangères
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('room');
            $table->dateTimeTz('start');
            $table->dateTimeTz('end');
            $table->boolean('hasRendu');
            $table->integer('periodeStart');
            $table->integer('periodeDuree');
            $table->timestamps();
            //Lien
            $table->integer('branche_id')->unsigned();
            $table->foreign('branche_id')
                ->references('id')
                ->on('branches')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
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
        if (DB::getDriverName() !== 'mysql') {
            Schema::table('cours', function (Blueprint $table) {
                $table->dropForeign('cours_branches_id_foreign');
                $table->dropForeign('cours_classe_id_foreign');
                $table->dropForeign('cours_module_id_foreign');
            });
        }
        Schema::dropIfExists('cours');
    }
};
