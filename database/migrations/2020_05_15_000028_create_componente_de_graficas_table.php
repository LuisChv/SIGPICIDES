<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteDeGraficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ComponenteDeGrafica', function (Blueprint $table) {
            $table->id();
            $table->integer('idIndicador');
            $table->string('ejeX', 50);
            $table->string('ejeY', 50);
            $table->foreign('idIndicador')->references('id')->on('Indicador');
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
        Schema::dropIfExists('ComponenteDeGrafica');
    }
}
