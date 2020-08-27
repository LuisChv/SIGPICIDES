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
        Schema::create('componente_de_grafica', function (Blueprint $table) {
            $table->id();
            $table->integer('id_indicador')->nullable();
            $table->boolean('modificable')->default(true);
            $table->string('eje_x', 50)->nullable();
            $table->string('eje_y', 50)->nullable();
            $table->foreign('id_indicador')->references('id')->on('indicador')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('componente_de_grafica');
    }
}
