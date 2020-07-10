<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoDeInvestigacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_de_investigacion', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2020_05_15_181503_create_equipo_de_investigacions_table.php
            $table->integer('idproy');
            $table->char('iduer',10);
            $table->boolean('haylider');
=======
            $table->boolean('hay_lider');
>>>>>>> e6adc5d12902e09607398056a6090f67cf848c13:database/migrations/2020_05_15_000002_create_equipo_de_investigacions_table.php
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
        Schema::dropIfExists('equipo_de_investigacion');
    }
}
