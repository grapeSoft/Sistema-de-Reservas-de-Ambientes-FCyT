<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->date('fecha');
            $table->time('horaIni');
            $table->time('horaFin');
            $table->string('materia');
            $table->string('titulo');
            $table->integer('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('USUARIO');
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
        Schema::dropIfExists('reserva');
    }
}
