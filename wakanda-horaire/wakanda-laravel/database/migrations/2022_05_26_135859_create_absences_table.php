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
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('motif');
            $table->boolean('isValid');
            $table->timestamps(); //date création
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
        if (DB::getDriverName() !== 'mysql') {
            Schema::table('absences', function (Blueprint $table) {
                $table->dropForeign('absences_user_id_foreign');
                $table->dropForeign('absences_cour_id_foreign');
            });
        }
        Schema::dropIfExists('absences');
    }
};
