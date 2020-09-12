<?php

use Illuminate\Database\Seeder;

class EstadoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Incompleta',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Lista para enviar',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Enviada para revisar',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Aprobada',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Aprobada parcialmente',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Denegada',
        ]);
    }
}
