<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('dni');
            $table->string('nombresyapellidos');
            $table->string('email');
            $table->string('departamento');
            $table->date('fecha_nacimiento');
            $table->string('provincia');
            $table->text('direccion');
            $table->string('grado');
            $table->string('profesion');
            $table->string('telefono');
            $table->string('trabajo');
            $table->boolean('sincronizado');
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
        Schema::dropIfExists('alumnos');
    }
}
