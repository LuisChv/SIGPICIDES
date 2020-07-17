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
        Schema::create('detalle_de_recurso', function (Blueprint $table) {
            $table->id();
            $table->integer('id_recurso');
            $table->string('descripcion', 1024);
            $table->string('modelo',30);
            $table->foreign('id_recurso')->references('id')->on('recurso')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_de_recurso');
    }
}
