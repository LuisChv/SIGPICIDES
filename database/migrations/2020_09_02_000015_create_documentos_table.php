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
        Schema::create('documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',1000);
            $table->string('doc',1000)->nullable();;
            $table->integer('id_tipo_doc');
            $table->integer('id_task')->nullable();
            $table->integer('id_indicador')->nullable();
            $table->integer('id_evaluacion')->nullable();
            $table->foreign('id_tipo_doc')->references('id')->on('tipo_doc')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_task')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_indicador')->references('id')->on('indicador')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_evaluacion')->references('id')->on('evaluacion')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('documento');
    }
}
