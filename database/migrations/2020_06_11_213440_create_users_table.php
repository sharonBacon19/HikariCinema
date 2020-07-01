<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->string('nombre', 200);
            $table->string('cedula')->unique();
            $table->timestamp('cedula_verified_at')->nullable();
            $table->integer('edad');
            $table->string('tarjeta', 24);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 20);
            $table->rememberToken();
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('users_rol_id_foreign');
            $table->dropColumn('rol_id');
        });

        Schema::dropIfExists('users');
    }
}
