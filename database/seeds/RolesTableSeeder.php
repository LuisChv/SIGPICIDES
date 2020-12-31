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
            //'special'       => 'all-access',

        ]);

        Role::create([
            'name'          => 'Coordinador',
            'slug'          => 'coordinador',
        ]);

        Role::create([
            'name'          => 'Director',
            'slug'          => 'director',
        ]);

        Role::create([
            'name'          => 'Investigador',
            'slug'          => 'investigador',
        ]);

        Role::create([
            'name'          => 'Investigador Principal',
            'slug'          => 'lider',
        ]);

        Role::create([
            'name'          => 'Investigador Adjunto',
            'slug'          => 'adjunto',
        ]);

        Role::create([
            'name'          => 'Colaborador',
            'slug'          => 'colaborador',
        ]);

        Role::create([
            'name'          => 'Experto',
            'slug'          => 'experto',
        ]);
    }
}
