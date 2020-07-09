<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosPorProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RecursosPorProy', function (Blueprint $table) {
            $table->id();
            $table->integer('idProy');
            $table->integer('idRecurso');
            $table->integer('cantidad');
            $table->foreign('idRecurso')->references('id')->on('Recurso');
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
        Schema::dropIfExists('RecursosPorProy');
    }
}
