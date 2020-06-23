<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeliculaGenero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula_genero', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelicula_id');
            $table->unsignedInteger('genero_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            $table->foreign('genero_id')->references('id')->on('generos');
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
        Schema::table('pelicula_genero', function (Blueprint $table) {
            $table->dropForeign('pelicula_genero_pelicula_id_foreign');
            $table->dropForeign('pelicula_genero_genero_id_foreign');

            $table->dropColumn('pelicula_id');
            $table->dropColumn('genero_id');
        });

        Schema::dropIfExists('pelicula_genero');
    }
}
