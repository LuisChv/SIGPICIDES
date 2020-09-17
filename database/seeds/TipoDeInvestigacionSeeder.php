<?php

use Illuminate\Database\Seeder;

class TipoDeInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Desarrollo de software'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Bases de datos'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Infraestructura y sistemas embebidos'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Ciencias de la computación'
        ]);
    }
}
