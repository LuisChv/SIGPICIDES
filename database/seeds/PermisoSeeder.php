<?php

use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permiso')->insert([
            'id' => 0,
            'nombre' => 'CreateUsers'
        ]);
        DB::table('permiso')->insert([
            'id' => 10,
            'nombre' => 'CreateUsuarioRol'
        ]);
        DB::table('permiso')->insert([
            'id' => 20,
            'nombre' => 'CreateRol'
        ]);
        DB::table('permiso')->insert([
            'id' => 30,
            'nombre' => 'CreateRolPermiso'
        ]);
        DB::table('permiso')->insert([
            'id' => 40,
            'nombre' => 'CreatePermiso'
        ]);
        DB::table('permiso')->insert([
            'id' => 50,
            'nombre' => 'CreateUsuarioPermiso'
        ]);
        DB::table('permiso')->insert([
            'id' => 60,
            'nombre' => 'CreateDetalleDeRecurso'
        ]);
        DB::table('permiso')->insert([
            'id' => 70,
            'nombre' => 'CreateMarca'
        ]);
        DB::table('permiso')->insert([
            'id' => 80,
            'nombre' => 'CreateRecurso'
        ]);
        DB::table('permiso')->insert([
            'id' => 90,
            'nombre' => 'CreateTipoDeRecurso'
        ]);
        DB::table('permiso')->insert([
            'id' => 100,
            'nombre' => 'CreateRecursoPorProy'
        ]);
        DB::table('permiso')->insert([
            'id' => 110,
            'nombre' => 'CreateUsuarioEquipoRol'
        ]);
        DB::table('permiso')->insert([
            'id' => 120,
            'nombre' => 'CreateRolPorProy'
        ]);
        DB::table('permiso')->insert([
            'id' => 130,
            'nombre' => 'CreateRolPermisoProy'
        ]);
        DB::table('permiso')->insert([
            'id' => 140,
            'nombre' => 'CreatePermisosPorProy'
        ]);
        DB::table('permiso')->insert([
            'id' => 150,
            'nombre' => 'CreateEquipoDeInvestigacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 160,
            'nombre' => 'CreateProyecto'
        ]);
        DB::table('permiso')->insert([
            'id' => 170,
            'nombre' => 'CreateComiteDeEvaluacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 180,
            'nombre' => 'CreateComiteUsuario'
        ]);
        DB::table('permiso')->insert([
            'id' => 190,
            'nombre' => 'CreateUsuarioEvaluacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 200,
            'nombre' => 'CreateEvaluacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 210,
            'nombre' => 'CreateEstadoDeTarea'
        ]);
        DB::table('permiso')->insert([
            'id' => 220,
            'nombre' => 'CreateTarea'
        ]);
        DB::table('permiso')->insert([
            'id' => 230,
            'nombre' => 'CreateHito'
        ]);
        DB::table('permiso')->insert([
            'id' => 240,
            'nombre' => 'CreatePlanificacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 250,
            'nombre' => 'CreateDocumento'
        ]);
        DB::table('permiso')->insert([
            'id' => 260,
            'nombre' => 'CreateEstadoDeSolicitud'
        ]);
        DB::table('permiso')->insert([
            'id' => 270,
            'nombre' => 'CreateSolicitud'
        ]);
        DB::table('permiso')->insert([
            'id' => 280,
            'nombre' => 'CreateTipoDoc'
        ]);
        DB::table('permiso')->insert([
            'id' => 290,
            'nombre' => 'CreateAlcance'
        ]);
        DB::table('permiso')->insert([
            'id' => 300,
            'nombre' => 'CreateSubTipoDeInvestigacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 310,
            'nombre' => 'CreateTipoDeInvestigacion'
        ]);
        DB::table('permiso')->insert([
            'id' => 320,
            'nombre' => 'CreateIndicador'
        ]);
        DB::table('permiso')->insert([
            'id' => 330,
            'nombre' => 'CreateObjetivo'
        ]);
        DB::table('permiso')->insert([
            'id' => 340,
            'nombre' => 'CreateVariable'
        ]);
        DB::table('permiso')->insert([
            'id' => 350,
            'nombre' => 'CreateEstadoDeProy'
        ]);
        DB::table('permiso')->insert([
            'id' => 360,
            'nombre' => 'CreateFactibilidad'
        ]);
        DB::table('permiso')->insert([
            'id' => 370,
            'nombre' => 'CreateComponenteDeGafica'
        ]);
        DB::table('permiso')->insert([
            'id' => 380,
            'nombre' => 'CreateValorEje'
        ]);
    }
}
