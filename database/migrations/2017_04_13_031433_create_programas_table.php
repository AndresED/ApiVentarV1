<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('nombre');
            $table->string('duracion');
            $table->boolean('estado');
            $table->string('cantidad_matricula');
            $table->string('descuento_matricula');
            $table->string('tipo_descuento_matricula');
            $table->string('cantidad_mensualidad');
            $table->string('descuento_mensualidad');
            $table->string('tipo_descuento_mensualidad');
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
        Schema::dropIfExists('programas');
    }
}
