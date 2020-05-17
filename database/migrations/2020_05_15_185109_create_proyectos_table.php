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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->integer('idindicador');
            $table->integer('idobjetivo');
            $table->integer('idalcance');
            $table->integer('idsubtipodeinv');
            $table->integer('idplan');
            $table->integer('idequi');
            $table->integer('idrpp');
            $table->integer('idfacproy');
            $table->integer('idsoli');
            $table->integer('idestadoproy');
            $table->string('nombredelproy',50);
            $table->string('descridelproy',70);
            $table->decimal('costoproy',7);
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
        Schema::dropIfExists('proyectos');
    }
}
