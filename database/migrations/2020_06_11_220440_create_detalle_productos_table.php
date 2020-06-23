<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('subtotal');
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
        Schema::table('detalle_productos', function (Blueprint $table) {
            $table->dropForeign('detalle_productos_producto_id_foreign');
            $table->dropColumn('producto_id');
        });
        Schema::dropIfExists('detalle_productos');
    }
}
