<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations. 
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::create('matriculas', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->date('fecha_matricula');
            $table->string('user_id');
            $table->string('alumno_id');
            $table->string('programa_id');
            $table->string('tipo_tarjeta');
            $table->string('banco_tarjeta');
            $table->string('numero_tarjeta');
            $table->string('mes_tarjeta');
            $table->string('anio_tarjeta');
            $table->string('clave_seguridad_tarjeta');
            $table->boolean('sincronizado');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('programa_id')->references('id')->on('programas');
            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
