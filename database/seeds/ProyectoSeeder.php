<?php

use Illuminate\Database\Seeder;
use App\Proyecto;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proyecto = new Proyecto;
        $proyecto->id_subtipo = 1;
        $proyecto->id_equipo = 1;
        $proyecto->nombre = "Proyecto 1";
        $proyecto->descripcion = " ";
        $proyecto->costo = 5;
        $proyecto->duracion = 5;
        $proyecto->save();
    }
}
