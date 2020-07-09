<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPermisoPorProysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolPermisoProy', function (Blueprint $table) {
            $table->id();
            $table->integer('idRol');
            $table->integer('idPermiso');
            $table->foreign('idRol')->references('id')->on('RolPorProy');
            $table->foreign('idPermiso')->references('id')->on('PermisoPorProy');
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
        Schema::dropIfExists('RolPermisoProy');
    }
}
