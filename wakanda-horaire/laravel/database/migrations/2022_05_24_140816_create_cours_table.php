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
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('room');
            $table->dateTimeTz('start');
            $table->dateTimeTz('end');
            $table->boolean('hasRendu');
            $table->timestamps();
            //Lien
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
            Schema::table('cours', function (Blueprint $table) {
                $table->dropForeign('cours_branches_id_foreign');
            });
        }
        Schema::dropIfExists('cours');
    }
};
