<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactibilidadDelProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factibilidad', function (Blueprint $table) {
            $table->id();
            $table->integer('id_proy');
            $table->string('tecnica',1500);
            $table->string('economia',1500);
            $table->string('financiera',1500);
            $table->string('operativa',1500);
            $table->string('fac_extra',1500);
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
        Schema::dropIfExists('factibilidad');
    }
}
