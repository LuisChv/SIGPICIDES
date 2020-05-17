<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->id();
            $table->integer('idvariable');
            $table->integer('idcomponente');
            $table->integer('iddoc');
            $table->string('detalle', 1000);
            $table->integer('cantvariables');
            $table->boolean('nombretipoind');
            $table->boolean('finalizado');
            $table->string('descripdeavance', 1000);
            $table->string('observaciones', 1000);
            $table->boolean('tipodegrafico');
            $table->date('fechafinalizado');
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
        Schema::dropIfExists('indicadors');
    }
}
