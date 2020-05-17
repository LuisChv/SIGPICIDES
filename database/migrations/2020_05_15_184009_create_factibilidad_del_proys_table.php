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
        Schema::create('factibilidad_del_proys', function (Blueprint $table) {
            $table->id();
            $table->integer('idproy');
            $table->string('tecnica',1500);
            $table->string('economia',1500);
            $table->string('financiera',1500);
            $table->string('operativa',1500);
            $table->string('facextra',1500);
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
        Schema::dropIfExists('factibilidad_del_proys');
    }
}
