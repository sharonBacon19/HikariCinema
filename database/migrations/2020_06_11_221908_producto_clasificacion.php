<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoClasificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_clasificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('clasificacion_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('clasificacion_id')->references('id')->on('clasificacion_productos');
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
        Schema::table('producto_clasificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->dropForeign('producto_clasificacion_producto_id_foreign');
            $table->dropForeign('producto_clasificacion_clasificacion_id_foreign');
        });
        Schema::dropIfExists('producto_clasificacion');
    }
}
