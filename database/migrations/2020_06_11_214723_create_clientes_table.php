<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 200);
            $table->string('cedula')->unique();
            $table->timestamp('cedula_verified_at')->nullable();
            $table->integer('edad');
            $table->string('tarjeta', 24);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('clientes_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('clientes');
    }
}
