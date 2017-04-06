<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USUARIO', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->enum('tipo', [
                'administrador',
                'docente',
                'autorizado',
            ]);
            $table->timestamps();
            $table->rememberToken();
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('USUARIO');
    }
}
