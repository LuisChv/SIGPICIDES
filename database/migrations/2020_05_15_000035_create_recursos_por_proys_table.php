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
        Schema::create('recursos_por_proy', function (Blueprint $table) {
            $table->id();
            $table->integer('id_proy');
            $table->integer('id_recurso');
            $table->integer('cantidad');
            $table->foreign('id_recurso')->references('id')->on('recurso')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_proy')->references('id')->on('proyecto')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('recursos_por_proy');
    }
}
