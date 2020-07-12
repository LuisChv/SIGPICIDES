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

       // factory(App\User::class, 10)->create();

       User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el administrador y tengo todos los permisos',
            'sexo' => true,
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        User::create([
            'name' => 'Coordinador',
            'email' => 'coordinador@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el coordinador',
            'sexo' => true,
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
        ]);

        User::create([
            'name' => 'Director',
            'email' => 'director@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el director',
            'sexo' => true,
        ]);

        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 3,
        ]);

        User::create([
            'name' => 'Investigador',
            'email' => 'investigador@gmail.com',
            'password' => Hash::make('secret'),
            'fecha_nac' => date("1998-08-22"),
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'Soy el investigador',
            'sexo' => true,
        ]);

        DB::table('role_user')->insert([
            'role_id' => 4,
            'user_id' => 4,
        ]);

    }
}
