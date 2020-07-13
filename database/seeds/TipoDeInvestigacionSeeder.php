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
            'nombre' => 'Tipo de investigación 1'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Tipo de investigación 2'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Tipo de investigación 3'
        ]);
        DB::table('tipo_de_investigacion')->insert([
            'nombre' => 'Tipo de investigación 4'
        ]);
    }
}
