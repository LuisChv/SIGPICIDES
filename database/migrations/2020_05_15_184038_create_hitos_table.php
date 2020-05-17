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
        Schema::create('hitos', function (Blueprint $table) {
            $table->id();
            $table->integer('iddoc');
            $table->integer('idevaperfil');
            $table->date('fechahito');
            $table->string('nombrehito',20);
            $table->date('fechaultmodif');
            $table->boolean('actualizado');
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
        Schema::dropIfExists('hitos');
    }
}
