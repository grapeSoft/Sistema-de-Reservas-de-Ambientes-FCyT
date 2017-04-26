<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechaHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha_horario', function (Blueprint $table) {
            $table->date('id_fecha');
            $table->integer('id_horario');
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
        Schema::dropIfExists('fecha_horario');
    }
}
