<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('Nombres');
            $table->string('RUT')->unique();
            $table->string('Apellidos');
            $table->string('Correo');
            $table->string('Telefono');
            $table->string('Dirección');
            $table->string('Contrasena');
            $table->string('Carrera')->nullable();
            $table->integer('TipoUsuario');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('RUT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
