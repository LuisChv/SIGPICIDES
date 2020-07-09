<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Variable', function (Blueprint $table) {
            $table->id();
            $table->integer('idIndicador');
            $table->string('nombre',50);
            $table->string('color',20);
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
        Schema::dropIfExists('Variable');
    }
}
