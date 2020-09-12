<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modificacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('solicitar')->default(false);
            $table->string('razon');
            $table->string('comentario')->nullable();
            $table->boolean('respuesta');
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
        Schema::dropIfExists('modificacion');
    }
}
