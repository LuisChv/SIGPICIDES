<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoDeSoliProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EstadoDeSolicitud', function (Blueprint $table) {
            $table->id();
            $table->integer('idSolicitud');
            $table->string('estado',25);
            $table->foreign('idSolicitud')->references('id')->on('Solicitud');
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
        Schema::dropIfExists('EstadoDeSolicitud');
    }
}
