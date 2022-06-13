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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
            //Lien
            $table->integer('cour_id')->unsigned();
            $table->foreign('cour_id')
                ->references('id')
                ->on('cours')
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
        if (DB::getDriverName() !== 'mysql') {
            Schema::table('commentaires', function (Blueprint $table) {
                $table->dropForeign('commentaires_cour_id_foreign');
                $table->dropForeign('commentaires_user_id_foreign');
            });
        }
        Schema::dropIfExists('commentaires');
    }
};
