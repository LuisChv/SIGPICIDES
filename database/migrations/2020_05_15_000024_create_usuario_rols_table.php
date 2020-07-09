<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuarioRol', function (Blueprint $table) {
            $table->id();
            $table->integer('idUsuario');
            $table->integer('idRol');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idRol')->references('id')->on('Rol');
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
        Schema::dropIfExists('UsuarioRol');
    }
}
