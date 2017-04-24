<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->string('id_evento');
            $table->integer('id_reserva');
            $table->integer('id_ambiente');
            $table->foreign('id_reserva')->references('id_reserva')->on('reserva');
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
        Schema::dropIfExists('evento');
    }
}
