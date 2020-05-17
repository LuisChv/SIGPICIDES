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
        Schema::create('componente_de_graficas', function (Blueprint $table) {
            $table->id();
            $table->integer('idindicador');
            $table->string('ejex', 50);
            $table->string('ejey', 50);
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
        Schema::dropIfExists('componente_de_graficas');
    }
}
