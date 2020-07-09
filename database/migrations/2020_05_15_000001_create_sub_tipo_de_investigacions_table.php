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
        Schema::create('SubTipoDeInvestigacion', function (Blueprint $table) {
            $table->id();
            $table->integer('idTipo');
            $table->string('nombre', 100);
            $table->foreign('idTipo')->references('id')->on('TipoDeInvestigacion');
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
        Schema::dropIfExists('SubTipoDeInvestigacion');
    }
}
