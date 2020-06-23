<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionPeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacion_peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('puntuaje');
            $table->unsignedInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
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
        Schema::table('votacion_peliculas', function (Blueprint $table) {
            $table->dropForeign('votacion_peliculas_pelicula_id_foreign');
            $table->dropColumn('pelicula_id');
        });
        Schema::dropIfExists('votacion_peliculas');
    }
}
