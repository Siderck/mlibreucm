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
<<<<<<< Updated upstream
        Schema::create('users', function (Blueprint $table) {
            $table->string('nombres');
=======
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('name');
>>>>>>> Stashed changes
            $table->string('rut')->unique();
            $table->string('apellidos');
            $table->string('correo');
            $table->string('telefono');
            $table->string('dirección');
<<<<<<< Updated upstream
            $table->string('contrasena');
=======
            $table->string('password');
>>>>>>> Stashed changes
            $table->string('carrera')->nullable();
            $table->integer('tipousuario');
            $table->rememberToken();
            $table->timestamps();
            $table->primary('rut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
