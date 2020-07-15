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
        

        //Marcas y tipoRecurso
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
            'nombre' => 'Tipo Recurso 1'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 2,
            'nombre' => 'Tipo Recurso2'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 3,
            'nombre' => 'Tipo Recurso 3'
        ]);
        DB::table('tipo_de_recurso')->insert([
            'id' => 4,
            'nombre' => 'Tipo Recurso 4'
        ]);
        
    }
}
