<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTipoDeInvestigacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipo_de_investigacion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo');
            $table->string('nombre', 100);
            $table->foreign('id_tipo')->references('id')->on('tipo_de_investigacion')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('subtipo_de_investigacion');
    }
}
