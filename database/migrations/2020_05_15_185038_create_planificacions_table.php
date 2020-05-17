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
        Schema::create('planificacions', function (Blueprint $table) {
            $table->id();
            $table->integer('idproy');
            $table->integer('idhito');
            $table->integer('idtarea');
            $table->string('descripcionplan',1000);
            $table->date('fechainicio');
            $table->date('fechafin');
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
        Schema::dropIfExists('planificacions');
    }
}
