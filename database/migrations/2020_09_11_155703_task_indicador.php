<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskIndicador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_indicador', function (Blueprint $table) {
            $table->id();
            $table->integer("id_indicador")->nullable();
            $table->foreign('id_indicador')->references('id')->on('indicador')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_task")->nullable();
            $table->foreign('id_task')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('task_indicador');
    }
}
