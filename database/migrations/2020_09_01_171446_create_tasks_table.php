<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table){
            $table->id();
            $table->string('text');
            $table->integer('duration')->default(1);
            $table->float('progress')->default(0);
            $table->dateTime('start_date');
            $table->integer('parent');
            $table->integer("id_proyecto")->nullable();;
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type');
            $table->boolean('readonly');
            $table->boolean('modificable');
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
        Schema::dropIfExists('tasks');
    }
}
