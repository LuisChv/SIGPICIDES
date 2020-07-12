<?php

use Illuminate\Database\Seeder;

class MarcaTipoRecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marca')->insert([
            'id' => 1,
            'nombre' => 'HP'
        ]);
        DB::table('marca')->insert([
            'id' => 2,
            'nombre' => 'DELL'
        ]);
        DB::table('marca')->insert([
            'id' => 3,
            'nombre' => 'ASUS'
        ]);
        DB::table('marca')->insert([
            'id' => 4,
            'nombre' => 'LENOVO'
        ]);
        DB::table('marca')->insert([
            'id' => 5,
            'nombre' => 'ACER'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 1,
            'nombre' => 'Recurso1'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 2,
            'nombre' => 'Recurso2'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 3,
            'nombre' => 'Recurso3'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 4,
            'nombre' => 'Recurso4'
        ]);
    }
}

