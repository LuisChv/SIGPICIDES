<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPermisoPorProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permiso_por_proys', function (Blueprint $table) {
            $table->id();
            $table->integer('idRol');
            $table->integer('idPermiso');
            $table->foreign('idRol')->references('id')->on('rol_por_proys');
            $table->foreign('idPermiso')->references('id')->on('permiso_por_proys');
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
        Schema::dropIfExists('rol_permiso_por_proys');
    }
}
