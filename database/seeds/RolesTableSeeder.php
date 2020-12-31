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
            'tipo_rol'   => false,
            //'special'       => 'all-access',

        ]);

        Role::create([
            'name'          => 'Coordinador',
            'slug'          => 'coordinador',
            'tipo_rol'   => false,
        ]);

        Role::create([
            'name'          => 'Director',
            'slug'          => 'director',
            'tipo_rol'   => false,
        ]);

        Role::create([
            'name'          => 'Investigador',
            'slug'          => 'investigador',
            'tipo_rol'   => false,
        ]);

        Role::create([
            'name'          => 'Investigador Principal',
            'slug'          => 'lider',
            'tipo_rol'   => true,
        ]);

        Role::create([
            'name'          => 'Investigador Adjunto',
            'slug'          => 'adjunto',
            'tipo_rol'   => true,
        ]);

        Role::create([
            'name'          => 'Colaborador',
            'slug'          => 'colaborador',
            'tipo_rol'   => true,
        ]);

        Role::create([
            'name'          => 'Experto',
            'slug'          => 'experto',
            'tipo_rol'   => false,
        ]);
    }
}
