<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComiteUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ComiteUsuario', function (Blueprint $table) {
            $table->id();
            $table->integer('idUsuario');
            $table->integer('idComite');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idComite')->references('id')->on('ComiteDeEvaluacion');
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
        Schema::dropIfExists('ComiteUsuario');
    }
}
