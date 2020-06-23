<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->boolean('estado')->default(true);
            $table->integer('precio');
            $table->string('descripcion', 200);
            $table->unsignedInteger('tipoproducto_id');
            $table->foreign('tipoproducto_id')->references('id')->on('tipo_productos');
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
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_tipoproducto_id_foreign');
            $table->dropColumn('tipoproducto_id');
        });
        Schema::dropIfExists('productos');
    }
}
