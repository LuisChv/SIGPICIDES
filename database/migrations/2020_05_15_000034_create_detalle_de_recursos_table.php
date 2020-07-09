<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDeRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DetalleDeRecurso', function (Blueprint $table) {
            $table->id();
            $table->integer('idRecurso');
            $table->string('descripcion', 100);
            $table->string('modelo',30);
            $table->foreign('idRecurso')->references('id')->on('Recurso');
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
        Schema::dropIfExists('DetalleDeRecurso');
    }
}
