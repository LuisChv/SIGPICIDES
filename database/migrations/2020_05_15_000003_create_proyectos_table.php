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
        Schema::create('Proyecto', function (Blueprint $table) {
            $table->id();
            $table->integer('idSubTipo');
            $table->integer('idEquipo');
            $table->string('nombre',50);
            $table->string('descripcion',70);
            $table->decimal('costo',7);
            $table->foreign('idSubTipo')->references('id')->on('SubTipoDeInvestigacion');
            $table->foreign('idEquipo')->references('id')->on('EquipoDeInvestigacion');
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
        Schema::dropIfExists('Proyecto');
    }
}
