<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurso', function (Blueprint $table) {
            $table->id();
            $table->integer('id_marca')->nullable();
            $table->integer('id_tipo');
            $table->string('nombre',30);
            $table->foreign('id_marca')->references('id')->on('marca')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tipo')->references('id')->on('tipo_de_recurso')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('recurso');
    }
}
