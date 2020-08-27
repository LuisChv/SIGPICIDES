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
        Schema::create('hito', function (Blueprint $table) {
            $table->id();
            $table->integer('id_plan');
            $table->date('fecha_hito');
            $table->string('nombre',20);
            $table->foreign('id_plan')->references('id')->on('planificacion')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hito');
    }
}
