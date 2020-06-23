<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacion_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('puntuaje');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::table('votacion_productos', function (Blueprint $table) {
            $table->dropForeign('votacion_productos_producto_id_foreign');
            $table->dropColumn('producto_id');
        });
        Schema::dropIfExists('votacion_productos');
    }
}
