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
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dimin');
            $table->integer('coefficient');
            $table->string('nom');
            $table->string('description', 2000);
            $table->integer('annee');
            $table->integer('semestreFormation');
            $table->string('modalite');
            $table->timestamps();
            //Lien
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
            Schema::table('branches', function (Blueprint $table) {
                $table->dropForeign('branches_module_id_foreign');
            });
        }
        Schema::dropIfExists('branches');
    }
};
