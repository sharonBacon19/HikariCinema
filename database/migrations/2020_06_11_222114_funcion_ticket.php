<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuncionTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcion_ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('funcion_id');
            $table->unsignedInteger('ticket_id');
            $table->foreign('funcion_id')->references('id')->on('funcions');
            $table->foreign('ticket_id')->references('id')->on('tickets');
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
        Schema::table('funcion_ticket', function (Blueprint $table) {
            $table->dropForeign('funcion_ticket_funcion_id_foreign');
            $table->dropForeign('funcion_ticket_ticket_id_foreign');
        });
        Schema::dropIfExists('funcion_ticket');
    }
}
