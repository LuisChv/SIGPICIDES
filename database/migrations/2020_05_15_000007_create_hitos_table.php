<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Hito', function (Blueprint $table) {
            $table->id();
            $table->integer('idPlan');
            $table->date('fechaHito');
            $table->string('nombre',20);
            $table->date('ultimaModificacion');
            $table->boolean('actualizado');
            $table->foreign('idPlan')->references('id')->on('Planificacion');
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
        Schema::dropIfExists('Hito');
    }
}
