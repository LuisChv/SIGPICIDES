<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValorEjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valor_eje', function (Blueprint $table) {
            $table->id();
            $table->integer('id_variable')->nullable();
            $table->boolean('modificable')->default(true);
            $table->decimal('valor_x')->nullable();
            $table->decimal('valor_y')->nullable();
            $table->foreign('id_variable')->references('id')->on('variable')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('valor_eje');
    }
}
