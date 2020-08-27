<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HitoUserEva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hito_user_eva', function (Blueprint $table) {
            $table->id();
            $table->integer("id_user");
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_evaluacion");
            $table->foreign('id_evaluacion')->references('id')->on('evaluacion')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_hito");
            $table->foreign('id_hito')->references('id')->on('hito')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hito_user_eva');
    }
}
