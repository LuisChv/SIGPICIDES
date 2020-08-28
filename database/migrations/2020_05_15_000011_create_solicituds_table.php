<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->integer('id_proy');
            $table->boolean('enviada')->default(false);
            $table->boolean('noti_inv');
            $table->boolean('modificable')->default(true);
            $table->boolean('noti_coo');
            $table->integer('id_estado');
            $table->foreign('id_estado')->references('id')->on('estado_de_solicitud')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_proy')->references('id')->on('proyecto')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('solicitud');
    }
}
