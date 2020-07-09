<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Planificacion', function (Blueprint $table) {
            $table->id();
            $table->integer('idProyecto');
            $table->string('descripcion',1000);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->foreign('idProyecto')->references('id')->on('Proyecto');
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
        Schema::dropIfExists('Planificacion');
    }
}
