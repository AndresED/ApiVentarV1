<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('id');
            $table->primary('id');
            $table->string('dni');
            $table->string('nombresyapellidos');
            $table->string('username');
            $table->string('estado');
            $table->string('email');
            $table->string('password');
            $table->string('telefono');
            $table->boolean('permiso');
            $table->boolean('sincronizado');
            $table->text('ruta_foto_perfil');
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
        Schema::dropIfExists('users');
    }
}
