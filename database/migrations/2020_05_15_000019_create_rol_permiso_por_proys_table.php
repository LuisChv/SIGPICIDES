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
        Schema::create('rol_permiso_roy', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rol');
            $table->integer('id_permiso');
            $table->foreign('id_rol')->references('id')->on('rol_por_proy')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_permiso')->references('id')->on('permiso_por_proy')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rol_permiso_roy');
    }
}
