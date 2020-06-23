<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->boolean('estado')->default(true);
            $table->string('sinopsis', 300);
            $table->unsignedInteger('clasificacionpelicula_id');
            $table->foreign('clasificacionpelicula_id')->references('id')->on('clasificacion_peliculas');
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
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropForeign('peliculas_clasificacionpelicula_id_foreign');
            $table->dropColumn('clasificacionpelicula_id');
        });
        Schema::dropIfExists('peliculas');
    }
}
