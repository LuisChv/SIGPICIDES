<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evaluacion', function (Blueprint $table) {
            $table->id();
            $table->integer('idComite');
            $table->integer('idSolicitud');
            $table->integer('idHito');
            $table->integer('cantEva');
            $table->string('comentario',200);
            $table->date('fecha');
            $table->foreign('idComite')->references('id')->on('ComiteDeEvaluacion');
            $table->foreign('idSolicitud')->references('id')->on('Solicitud');
            $table->foreign('idHito')->references('id')->on('Hito');
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
        Schema::dropIfExists('Evaluacion');
    }
}
