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
        DB::table('Permiso')->insert([
            'id' => 0,
            'nombre' => 'CreateUsers'
        ]);
        DB::table('Permiso')->insert([
            'id' => 10,
            'nombre' => 'CreateUsuarioRol'
        ]);
        DB::table('Permiso')->insert([
            'id' => 20,
            'nombre' => 'CreateRol'
        ]);
        DB::table('Permiso')->insert([
            'id' => 30,
            'nombre' => 'CreateRolPermiso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 40,
            'nombre' => 'CreatePermiso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 50,
            'nombre' => 'CreateUsuarioPermiso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 60,
            'nombre' => 'CreateDetalleDeRecurso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 70,
            'nombre' => 'CreateMarca'
        ]);
        DB::table('Permiso')->insert([
            'id' => 80,
            'nombre' => 'CreateRecurso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 90,
            'nombre' => 'CreateTipoDeRecurso'
        ]);
        DB::table('Permiso')->insert([
            'id' => 100,
            'nombre' => 'CreateRecursoPorProy'
        ]);
        DB::table('Permiso')->insert([
            'id' => 110,
            'nombre' => 'CreateUsuarioEquipoRol'
        ]);
        DB::table('Permiso')->insert([
            'id' => 120,
            'nombre' => 'CreateRolPorProy'
        ]);
        DB::table('Permiso')->insert([
            'id' => 130,
            'nombre' => 'CreateRolPermisoProy'
        ]);
        DB::table('Permiso')->insert([
            'id' => 140,
            'nombre' => 'CreatePermisosPorProy'
        ]);
        DB::table('Permiso')->insert([
            'id' => 150,
            'nombre' => 'CreateEquipoDeInvestigacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 160,
            'nombre' => 'CreateProyecto'
        ]);
        DB::table('Permiso')->insert([
            'id' => 170,
            'nombre' => 'CreateComiteDeEvaluacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 180,
            'nombre' => 'CreateComiteUsuario'
        ]);
        DB::table('Permiso')->insert([
            'id' => 190,
            'nombre' => 'CreateUsuarioEvaluacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 200,
            'nombre' => 'CreateEvaluacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 210,
            'nombre' => 'CreateEstadoDeTarea'
        ]);
        DB::table('Permiso')->insert([
            'id' => 220,
            'nombre' => 'CreateTarea'
        ]);
        DB::table('Permiso')->insert([
            'id' => 230,
            'nombre' => 'CreateHito'
        ]);
        DB::table('Permiso')->insert([
            'id' => 240,
            'nombre' => 'CreatePlanificacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 250,
            'nombre' => 'CreateDocumento'
        ]);
        DB::table('Permiso')->insert([
            'id' => 260,
            'nombre' => 'CreateEstadoDeSolicitud'
        ]);
        DB::table('Permiso')->insert([
            'id' => 270,
            'nombre' => 'CreateSolicitud'
        ]);
        DB::table('Permiso')->insert([
            'id' => 280,
            'nombre' => 'CreateTipoDoc'
        ]);
        DB::table('Permiso')->insert([
            'id' => 290,
            'nombre' => 'CreateAlcance'
        ]);
        DB::table('Permiso')->insert([
            'id' => 300,
            'nombre' => 'CreateSubTipoDeInvestigacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 310,
            'nombre' => 'CreateTipoDeInvestigacion'
        ]);
        DB::table('Permiso')->insert([
            'id' => 320,
            'nombre' => 'CreateIndicador'
        ]);
        DB::table('Permiso')->insert([
            'id' => 330,
            'nombre' => 'CreateObjetivo'
        ]);
        DB::table('Permiso')->insert([
            'id' => 340,
            'nombre' => 'CreateVariable'
        ]);
        DB::table('Permiso')->insert([
            'id' => 350,
            'nombre' => 'CreateEstadoDeProy'
        ]);
        DB::table('Permiso')->insert([
            'id' => 360,
            'nombre' => 'CreateFactibilidad'
        ]);
        DB::table('Permiso')->insert([
            'id' => 370,
            'nombre' => 'CreateComponenteDeGafica'
        ]);
        DB::table('Permiso')->insert([
            'id' => 380,
            'nombre' => 'CreateValorEje'
        ]);
    }
}
