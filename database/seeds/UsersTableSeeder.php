<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

/*---------------------------------------------------------------------------------------------------*/
        //Administrador
       $user=User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el administrador y tengo todos los permisos',
            'sexo' => true,
            'dark' => false

        ]);
        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 1');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => ($objeto->permission_id),
                'user_id' => 1,
            ]);
    
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 1,
        ]);

/*---------------------------------------------------------------------------------------------------*/
        //Coordinador
        $user=User::create([
            'name' => 'Coordinador',
            'email' => 'coordinador@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el coordinador',
            'sexo' => true,
            'dark' => false
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 2');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 2,
            ]);
    
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 2,
        ]);

/*---------------------------------------------------------------------------------------------------*/
        //Director
        $user=User::create([
            'name' => 'Director',
            'email' => 'director@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el director',
            'sexo' => true,
            'dark' => false
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 3');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 3,
            ]);
    
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 3,
        ]);

/*---------------------------------------------------------------------------------------------------*/
        //Investigador
        $user=User::create([
            'name' => 'Investigador',
            'email' => 'investigador@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 4,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 4,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 4,
        ]);

         //Investigador 2
         $user=User::create([
            'name' => 'Investigador 2',
            'email' => 'investigador2@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 2',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 5,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 5,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 5,
        ]);

    }
}
