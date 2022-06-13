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
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->integer('anneeDebut');
            $table->timestamps();
            //Lien
            $table->integer('filiere_id')->unsigned();
            $table->foreign('filiere_id')
                ->references('id')
                ->on('filieres')
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
            Schema::table('groups', function (Blueprint $table) {
                $table->dropForeign('groups_filiere_id_foreign');
            });
        }
        Schema::dropIfExists('groups');
    }
};
