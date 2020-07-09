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
        Schema::create('ValorEje', function (Blueprint $table) {
            $table->id();
            $table->integer('idVariable');
            $table->decimal('valorX');
            $table->decimal('valorY');
            $table->foreign('idVariable')->references('id')->on('Variable');
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
        Schema::dropIfExists('ValorEje');
    }
}
