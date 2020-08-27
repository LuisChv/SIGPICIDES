<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoliUserEva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soli_user_eva', function (Blueprint $table) {
            $table->id();
            $table->integer("id_user");
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_evaluacion");
            $table->foreign('id_evaluacion')->references('id')->on('evaluacion')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_solicitud");
            $table->foreign('id_solicitud')->references('id')->on('solicitud')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('soli_user_eva');
    }
}
