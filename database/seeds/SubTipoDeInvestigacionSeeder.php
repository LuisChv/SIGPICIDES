<?php

use Illuminate\Database\Seeder;

class SubTipoDeInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 1',
            'id_tipo' => 1,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 2',
            'id_tipo' => 1,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 3',
            'id_tipo' => 1,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 4',
            'id_tipo' => 1,
        ]);

        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 11',
            'id_tipo' => 2,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 12',
            'id_tipo' => 2,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 13',
            'id_tipo' => 2,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 14',
            'id_tipo' => 2,
        ]);

        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 21',
            'id_tipo' => 3,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 22',
            'id_tipo' => 3,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 23',
            'id_tipo' => 3,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 24',
            'id_tipo' => 3,
        ]);
        
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 31',
            'id_tipo' => 4,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 32',
            'id_tipo' => 4,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 33',
            'id_tipo' => 4,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Subtipo de investigación 34',
            'id_tipo' => 4,
        ]);
    }
}
