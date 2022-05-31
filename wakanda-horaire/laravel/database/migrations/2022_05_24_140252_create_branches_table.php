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
            $table->integer('id');
            $table->string('dimin')->primary();
            $table->integer('coefficient');
            $table->string('nom');
            $table->string('description');
            $table->integer('annee');
            $table->integer('anneeFormation');
            $table->timestamps();
            //Lien
            $table->string('module_id');
            $table->foreign('module_id')
                ->references('dimin')
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
