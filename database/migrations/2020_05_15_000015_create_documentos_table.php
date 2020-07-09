<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',1000);
            $table->string('doc',1000);
            $table->integer('idTipoDoc');
            $table->integer('idHito');
            $table->integer('idIndicador');
            $table->integer('idEvaluacion');
            $table->foreign('idTipoDoc')->references('id')->on('TipoDoc');
            $table->foreign('idHito')->references('id')->on('Hito');
            $table->foreign('idIndicador')->references('id')->on('Indicador');
            $table->foreign('idEvaluacion')->references('id')->on('Evaluacion');
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
        Schema::dropIfExists('Documento');
    }
}
