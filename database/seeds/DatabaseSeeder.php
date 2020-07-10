<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
=======
        $this->call([UsersTableSeeder::class]);
        $this->call([PermisoSeeder::class]);
>>>>>>> e6adc5d12902e09607398056a6090f67cf848c13
    }
}
