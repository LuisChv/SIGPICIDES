<?php

use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administrador
        for($i = 1; $i <= 195; $i++){
            if($i != 21 AND $i != 61){
                DB::table('rol_permiso')->insert([
                    'role_id' => 1,
                    'permission_id' => $i,
                ]);
            }
        }


/*----------------------------------------------------------------------------------------*/
        //Coordinador
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 7,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 8,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 12,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 13,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 17,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 18,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 22,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 23,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 27,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 28,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 32,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 33,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 37,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 38,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 42,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 43,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 47,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 48,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 51,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 52,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 53,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 54,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 55,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 56,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 57,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 58,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 59,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 60,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 62,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 63,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 67,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 68,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 71,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 72,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 73,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 74,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 75,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 77,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 78,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 81,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 82,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 83,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 84,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 85,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 87,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 88,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 97,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 98,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 137,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 138,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 139,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 142,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 143,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 147,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 148,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 152,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 153,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 157,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 158,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 162,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 163,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 167,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 168,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 172,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 173,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 177,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 178,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 182,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 183,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 187,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 188,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 192,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 193,
        ]);


/*----------------------------------------------------------------------------------------*/
        //Director
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 7,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 8,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 12,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 13,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 17,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 18,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 22,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 23,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 27,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 28,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 32,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 33,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 37,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 38,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 42,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 2,
            'permission_id' => 43,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 47,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 48,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 52,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 53,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 57,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 58,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 62,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 63,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 67,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 68,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 71,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 72,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 73,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 74,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 75,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 77,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 78,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 81,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 82,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 83,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 84,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 85,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 87,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 88,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 97,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 98,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 137,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 138,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 142,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 143,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 147,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 148,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 152,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 153,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 157,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 158,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 162,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 163,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 167,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 168,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 172,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 173,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 177,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 178,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 182,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 183,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 187,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 188,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 192,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 3,
            'permission_id' => 193,
        ]);

//TODO Modificar permisos de solicitud segun rol
/*----------------------------------------------------------------------------------------*/
        //Investigador
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 17,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 18,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 61,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 196,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 197,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 62,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 63,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 64,
        ]);
        DB::table('rol_permiso')->insert([
            'role_id' => 4,
            'permission_id' => 65,
        ]);
    }
}
