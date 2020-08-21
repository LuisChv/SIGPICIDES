<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Administrador',
            'slug'          => 'admin',
            'tipoRol'   => false,
            //'special'       => 'all-access',

        ]);

        Role::create([
            'name'          => 'Coordinador',
            'slug'          => 'coordinador',
            'tipoRol'   => false,
        ]);

        Role::create([
            'name'          => 'Director',
            'slug'          => 'director',
            'tipoRol'   => false,
        ]);

        Role::create([
            'name'          => 'Investigador',
            'slug'          => 'investigador',
            'tipoRol'   => false,
        ]);

        Role::create([
            'name'          => 'Investigador Principal',
            'slug'          => 'lider',
            'tipoRol'   => true,
        ]);

        Role::create([
            'name'          => 'Investigador Adjunto',
            'slug'          => 'adjunto',
            'tipoRol'   => true,
        ]);

        Role::create([
            'name'          => 'Colaborador',
            'slug'          => 'colaborador',
            'tipoRol'   => true,
        ]);
    }
}
