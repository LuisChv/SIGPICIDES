<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->integer('id_subtipo');
            $table->integer('id_equipo');
            $table->string('nombre', 1024);
            $table->integer('id_comite')->nullable();
            $table->integer('duracion')->nullable();
            $table->boolean('modificable')->default(true);
            $table->string('descripcion', 1024);
            $table->decimal('costo', 7)->nullable();
            $table->integer('id_estado')->nullable();
            $table->foreign('id_estado')->references('id')->on('estado_de_proy')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_subtipo')->references('id')->on('subtipo_de_investigacion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_equipo')->references('id')->on('equipo_de_investigacion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_comite')->references('id')->on('comite_de_evaluacion')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tema', 1024);
            $table->string('resultados', 1024);
            $table->string('justificacion', 1024);
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
        Schema::dropIfExists('proyecto');
    }
}
