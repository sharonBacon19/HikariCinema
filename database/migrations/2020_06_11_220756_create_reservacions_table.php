<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->integer('impuesto');
            #detproducto
            $table->unsignedInteger('detproducto_id');
            $table->foreign('detproducto_id')->references('id')->on('detalle_productos');
            #ticket
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            #cliente
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::table('reservacions', function (Blueprint $table) {
            $table->dropForeign('reservacions_ticket_id_foreign');
            $table->dropColumn('ticket_id');
            $table->dropForeign('reservacions_detproducto_id_foreign');
            $table->dropColumn('detproducto_id');
            $table->dropForeign('reservacions_cliente_id_foreign');
            $table->dropColumn('cliente_id');
        });
        Schema::dropIfExists('reservacions');
    }
}
