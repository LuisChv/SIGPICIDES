<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Solicitud', function (Blueprint $table) {
            $table->id();
            $table->integer('idProy');
            $table->date('fecha');
            $table->boolean('notiInv');
            $table->boolean('notiCoo');
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
        Schema::dropIfExists('Solicitud');
    }
}
