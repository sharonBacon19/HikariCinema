<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcions', function (Blueprint $table) {
            $table->increments('id');
            $table->time('horafuncion');
            $table->date('fechafuncion');
            #pelicula
            $table->unsignedInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            #sucursal
            $table->unsignedInteger('sucursal_id');
            $table->foreign('sucursal_id')->references('id')->on('sucursals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcions', function (Blueprint $table) {
            $table->dropForeign('funcions_sucursal_id_foreign');
            $table->dropColumn('sucursal_id');

            $table->dropForeign('funcions_pelicula_id_foreign');
            $table->dropColumn('pelicula_id');
        });
        Schema::dropIfExists('funcions');
    }
}
