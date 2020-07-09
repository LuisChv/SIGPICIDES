<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Indicador', function (Blueprint $table) {
            $table->id();
            $table->integer('idProy');
            $table->string('detalle', 1000);
            $table->integer('cantVariables');
            $table->boolean('tipo');
            $table->boolean('finalizado');
            $table->string('descripAvance', 1000);
            $table->string('observaciones', 1000);
            $table->boolean('tipoDeGrafico');
            $table->date('fechaFin');
            $table->foreign('idProy')->references('id')->on('Proyecto');
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
        Schema::dropIfExists('Indicador');
    }
}
