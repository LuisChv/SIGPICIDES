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
        //Investigador 1
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

        //Investigador 3
        $user=User::create([
            'name' => 'Investigador 3',
            'email' => 'investigador3@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 3',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 6,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 6,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 6,
        ]);

        //Investigador 4
        $user=User::create([
            'name' => 'Investigador 4',
            'email' => 'investigador4@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 4',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 7,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 7,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 7,
        ]);

        //Investigador 5
        $user=User::create([
            'name' => 'Investigador 5',
            'email' => 'investigador5@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 5',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 8,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 8,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 8,
        ]);

         //Investigador 6
         $user=User::create([
            'name' => 'Investigador 6',
            'email' => 'investigador6@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 6',
            'sexo' => true,
            'dark' => false,
        ]);
            
        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 9,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 9,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 9,
        ]);

        //Investigador 7
        $user=User::create([
            'name' => 'Investigador 7',
            'email' => 'investigador7@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 7',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 10,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 10,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 10,
        ]);

        //Investigador 8
        $user=User::create([
            'name' => 'Investigador 8',
            'email' => 'investigador8@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 8',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 11,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 4');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 11,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 11,
        ]);


        //Experto 1
        $user=User::create([
            'name' => 'Experto 1',
            'email' => 'experto1@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 8',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 8,
            'user_id' => 12,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 8');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 12,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 12,
        ]);

        //Experto 2
        $user=User::create([
            'name' => 'Experto 2',
            'email' => 'experto2@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 8',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 8,
            'user_id' => 13,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 8');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 13,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 13,
        ]);

        //Experto 2
        $user=User::create([
            'name' => 'Experto 3',
            'email' => 'experto3@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador 8',
            'sexo' => true,
            'dark' => false,
        ]);

        $user->email_verified_at = now();
        $user->save();

        DB::table('role_user')->insert([
            'role_id' => 8,
            'user_id' => 14,
        ]);

        $objetos = DB::select('SELECT * FROM rol_permiso WHERE role_id = 8');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 14,
            ]);
        }
        DB::table('permission_user')->insert([
            'permission_id' => (198),
            'user_id' => 14,
        ]);

    }
}
