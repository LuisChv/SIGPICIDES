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
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_comite');
            $table->integer('id_solicitud');
            $table->integer('id_hito')->nullable();
            $table->integer('cant_eva')->nullable();
            $table->string('comentario',200)->nullable();
            $table->boolean('aprobacion')->default('false');
            $table->boolean('visible')->default('true');
            $table->foreign('id_comite')->references('id')->on('comite_de_evaluacion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_solicitud')->references('id')->on('solicitud')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_hito')->references('id')->on('hito')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('evaluacion');
    }
}
