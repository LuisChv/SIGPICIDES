<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactibilidadDelProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Factibilidad', function (Blueprint $table) {
            $table->id();
            $table->integer('idProy');
            $table->string('tecnica',1500);
            $table->string('economia',1500);
            $table->string('financiera',1500);
            $table->string('operativa',1500);
            $table->string('facExtra',1500);
            $table->foreign('idProy')->references('id')->on('Proyecto');
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
        Schema::dropIfExists('Factibilidad');
    }
}
