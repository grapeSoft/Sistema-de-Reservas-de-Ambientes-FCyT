<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidad', function (Blueprint $table) {
            $table->increments('id_ambiente');
            $table->integer('id_horario');
            $table->date('id_fecha');
            $table->char('estado');
            $table->foreign('id_ambiente')->references('id_ambiente')->on('ambiente');
            $table->foreign('id_horario')->references('id_horario')->on('horario');
            $table->foreign('id_fecha')->references('id_fecha')->on('fecha');
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
        Schema::dropIfExists('disponibilidad');
    }
}
