<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Recurso', function (Blueprint $table) {
            $table->id();
            $table->integer('idMarca');
            $table->integer('idTipo');
            $table->string('nombre',30);
            $table->foreign('idMarca')->references('id')->on('Marca');
            $table->foreign('idTipo')->references('id')->on('TipoDeRecurso');
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
        Schema::dropIfExists('Recurso');
    }
}
