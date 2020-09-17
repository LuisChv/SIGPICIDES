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
            'nombre' => 'Estudios comparativos sobre tecnología de desarrollo de software',
            'id_tipo' => 1,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Desarrollo de nuevas tecnologías para el desarrollo de software',
            'id_tipo' => 1,
        ]);

        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Estudios comparativos sobre tecnología de almacenamiento',
            'id_tipo' => 2,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Diseño de nuevas tecnologías para el almacenamiento de datos',
            'id_tipo' => 2,
        ]);

        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Transferencia de tecnología en el ámbito de infraestructura',
            'id_tipo' => 3,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Transferencia de tecnología en el ámbito de Sistemas Embebidos',
            'id_tipo' => 3,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Diseño e implementación de componentes embebidos de hardware',
            'id_tipo' => 3,
        ]);

        
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Inteligencia artificial',
            'id_tipo' => 4,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Ciencia de datos',
            'id_tipo' => 4,
        ]);
        DB::table('subtipo_de_investigacion')->insert([
            'nombre' => 'Big data',
            'id_tipo' => 4,
        ]);

    }
}
