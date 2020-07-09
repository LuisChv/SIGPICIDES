<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuarioPermiso', function (Blueprint $table) {
            $table->id();
            $table->integer('idUsuario');
            $table->integer('idPermiso');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idPermiso')->references('id')->on('Permiso');
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
        Schema::dropIfExists('UsuarioPermiso');
    }
}
