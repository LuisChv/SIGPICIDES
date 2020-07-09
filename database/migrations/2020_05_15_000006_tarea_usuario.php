<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TareaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TareaUsuario', function (Blueprint $table) {
            $table->id();
            $table->integer("idUsuario");
            $table->integer("idTarea");
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idTarea')->references('id')->on('Tarea');
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
        Schema::dropIfExists('TareaUsuario');
    }
}
