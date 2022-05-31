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
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valeur');
            $table->integer('coefficient');
            $table->string('description');
            $table->boolean('isExam');
            $table->timestamps();
            //Lien
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('branche_id')->unsigned();
            $table->foreign('branche_id')
                ->references('id')
                ->on('branches')
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
            Schema::table('notes', function (Blueprint $table) {
                $table->dropForeign('notes_user_id_foreign');
                $table->dropForeign('notes_branche_id_foreign');
            });
        }
        Schema::dropIfExists('notes');
    }
};
