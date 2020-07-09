<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolPermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolPermiso', function (Blueprint $table) {
            $table->id();
            $table->integer('idPermiso');
            $table->integer('idRol');
            $table->foreign('idPermiso')->references('id')->on('Permiso');
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
        Schema::dropIfExists('RolPermiso');
    }
}
