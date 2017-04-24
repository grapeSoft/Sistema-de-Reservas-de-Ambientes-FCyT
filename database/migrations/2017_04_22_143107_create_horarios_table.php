<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->date('id_fecha');
            $table->integer('id_ambiente');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('estado');
            $table->foreign('id_fecha')->references('id_fecha')->on('fecha');
            $table->foreign('id_ambiente')->references('id_ambiente')->on('ambiente');
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
        Schema::dropIfExists('horarios');
    }
}
