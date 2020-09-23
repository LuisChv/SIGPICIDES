<?php

use Illuminate\Database\Seeder;
use App\EquipoDeInvestigacion;

class EquipoInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipo = new EquipoDeInvestigacion;
        $equipo->miembros = 5;
       // $equipo->save();
    }
}
