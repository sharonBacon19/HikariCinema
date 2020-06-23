<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->integer('precio');
            #campo
            $table->unsignedInteger('campo_id');
            $table->foreign('campo_id')->references('id')->on('campos');
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
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_campo_id_foreign');
            $table->dropColumn('campo_id');
        });
        Schema::dropIfExists('tickets');
    }
}
