<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuario
        Permission::create([
            'name'          => 'Navegar Usuarios',
            'slug'          => 'users.index',
            'description'   => 'Navega todos los usuarios del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Usuarios',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario del sistema',
        ]);

    
        Permission::create([
            'name'          => 'Edicion Usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Edita los datos de un usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Elimina los usuarios del sistema',
        ]);


        //Roles
        Permission::create([
            'name'          => 'Navegar Roles',
            'slug'          => 'roles.index',
            'description'   => 'Navega todos los Roles del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Roles',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada Rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Roles',
            'slug'          => 'roles.create',
            'description'   => 'Crea los Roles del sistema',
        ]);
    
        Permission::create([
            'name'          => 'Edicion Roles',
            'slug'          => 'roles.edit',
            'description'   => 'Edita los datos de un Rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina los roles del sistema',
        ]);

        //Recursos
        Permission::create([
            'name'          => 'Navegar Recursos',
            'slug'          => 'recursos.index',
            'description'   => 'Navega todos los Recursos del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Recursos',
            'slug'          => 'recursos.show',
            'description'   => 'Ver en detalle cada Producto del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Recursos',
            'slug'          => 'recursos.create',
            'description'   => 'Crea los Recursos del sistema',
        ]);
    
        Permission::create([
            'name'          => 'Edicion Recursos',
            'slug'          => 'recursos.edit',
            'description'   => 'Edita los datos de un Producto del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Recursos',
            'slug'          => 'recursos.destroy',
            'description'   => 'Elimina los Recursos del sistema',
        ]);
    }
}
