<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEquipoRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuarioEquipoRol', function (Blueprint $table) {
            $table->id();
            $table->integer('idEquipo');
            $table->integer('idRol');
            $table->integer('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idEquipo')->references('id')->on('EquipoDeInvestigacion');
            $table->foreign('idRol')->references('id')->on('RolPorProy');
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
        Schema::dropIfExists('UsuarioEquipoRol');
    }
}
