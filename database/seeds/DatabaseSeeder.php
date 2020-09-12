<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablaSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call([UsersTableSeeder::class]);
        $this->call([TipoDeInvestigacionSeeder::class]);
        $this->call([SubTipoDeInvestigacionSeeder::class]);
        $this->call([MarcaTipoRecursoSeeder::class]);
        $this->call([RecursoSeeder::class]);
        $this->call([EquipoInvestigacionSeeder::class]);
        $this->call([ProyectoSeeder::class]);
        $this->call(TasksTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(EstadoSolicitudSeeder::class);
    }
}
