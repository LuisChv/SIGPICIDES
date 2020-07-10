<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        factory(App\User::class, 10)->create();

        Role::create([
            'name'          => 'Admin',
            'slug'          => 'admin',
            'special'       => 'all-access',
=======
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'fecha_nac' => '1998-08-22',
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'admin',
            'sexo' => true,
            'created_at' => now(),
            'updated_at' => now()
>>>>>>> e6adc5d12902e09607398056a6090f67cf848c13
        ]);
    }
}
