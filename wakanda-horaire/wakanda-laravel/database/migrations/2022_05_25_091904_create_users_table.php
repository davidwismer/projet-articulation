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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->date('dateNaissance');
            $table->string('email', 50)->unique();
            $table->string('password', 250);
            $table->string('noTel', 10);
            $table->string('adresse', 250);
            $table->string('photo');
            $table->timestamps();
            //Liens
            $table->integer('filiere_id')->unsigned();
            $table->foreign('filiere_id')
                ->references('id')
                ->on('filieres')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')
                ->references('id')
                ->on('classes')
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
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_filiere_id_foreign');
                $table->dropForeign('users_role_id_foreign');
                $table->dropForeign('users_classe_id_foreign');
            });
        }
        Schema::dropIfExists('users');
    }
};
