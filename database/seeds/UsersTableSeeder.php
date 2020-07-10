<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'fecha_nac' => '1998-08-22',
            'institucion' => 'Universidad de El Salvador',
            'descripcion' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
