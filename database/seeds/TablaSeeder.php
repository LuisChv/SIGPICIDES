<?php

use Illuminate\Database\Seeder;

class TablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tabla')->insert([
        	'nombre' => 'Usuarios'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Tipo de investigación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Subtipo de investigación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Equipo de investigación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Planificación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Tarea'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Tarea & usuario'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Hito'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Indicador'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Comité de evaluación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Comité & Usuario'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Solicitud'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Estado de solicitud'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Evaluación'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Tipo de documento'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Documento'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Estado de tarea'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Permiso por proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Rol por proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Rol & permiso & proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Usuario & Equipo & Rol'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Permisos'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Permisos de usuario'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Rol'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Rol de usuario'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Rol & permiso'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Estado de proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Factibilidad'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Componente de gráfica'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Variable'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Valor de coordenadas' //tabla valor_eje
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Marca'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Tipo de recurso'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => ''
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Recurso'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Detalle de recurso'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Recursos por proyecto'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Alcance'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Objetivo'
        ]);
        DB::table('tabla')->insert([
        	'nombre' => 'Permisos especiales'
        ]);
    }
}
