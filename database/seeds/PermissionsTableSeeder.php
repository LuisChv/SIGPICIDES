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
        //Usuarios
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


        //Proyectos
        Permission::create([
            'name'          => 'Navegar Proyectos',
            'slug'          => 'proyectos.index',
            'description'   => 'Navega todos los Proyectos del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Proyectos',
            'slug'          => 'proyectos.show',
            'description'   => 'Ver en detalle cada Proyecto del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Proyectos',
            'slug'          => 'proyectos.create',
            'description'   => 'Crea los Proyectos del sistema',
        ]);
    
        Permission::create([
            'name'          => 'Edicion Proyectos',
            'slug'          => 'proyectos.edit',
            'description'   => 'Edita los datos de un Proyecto sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Proyectos',
            'slug'          => 'proyectos.destroy',
            'description'   => 'Elimina los Proyectos del sistema',
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

        //Solicitudes
        Permission::create([
            'name'          => 'Navegar Solicitudes',
            'slug'          => 'solicitudes.index',
            'description'   => 'Navega todos los Solicitudes del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Solicitudes',
            'slug'          => 'solicitudes.show',
            'description'   => 'Ver en detalle cada Solicitud del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Solicitudes',
            'slug'          => 'solicitudes.create',
            'description'   => 'Crea los Solicitudes del sistema',
        ]);
    
        Permission::create([
            'name'          => 'Edicion Solicitudes',
            'slug'          => 'solicitudes.edit',
            'description'   => 'Edita los datos de un Solicitudes del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Solicitudes',
            'slug'          => 'solicitudes.destroy',
            'description'   => 'Elimina los Solicitudes del sistema',
        ]);


         //Indicadores
         Permission::create([
            'name'          => 'Navegar Indicadores',
            'slug'          => 'indicadores.index',
            'description'   => 'Navega todos los Indicadores del sistema',
        ]);


        Permission::create([
            'name'          => 'Ver detalle Indicadores',
            'slug'          => 'indicadores.show',
            'description'   => 'Ver en detalle cada Indicadores del sistema',
        ]);

        Permission::create([
            'name'          => 'Crear Indicadores',
            'slug'          => 'indicadores.create',
            'description'   => 'Crea los Indicadores del sistema',
        ]);
    
        Permission::create([
            'name'          => 'Edicion Indicadores',
            'slug'          => 'indicadores.edit',
            'description'   => 'Edita los datos de un Indicadores del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar Indicadores',
            'slug'          => 'indicadores.destroy',
            'description'   => 'Elimina los Indicadores del sistema',
        ]);
    }
}
