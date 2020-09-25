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
            'estado'=>'Perfil aceptado con condición',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Perfil aprobado',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Planificación aceptada con condición',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Planificación aprobada',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Denegada',
        ]);
        DB::table('estado_de_solicitud')->insert([
            'estado'=>'Corregida',
        ]);


        //Estado para proyecto aprobado
        DB::table('estado_de_proyecto')->insert([
            'estado'=>'Aprobado',
        ]);
    }
}
