<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class PermissionController extends Controller
{
    public function index($user)
    {
        
        $permisos = DB::select(
            "SELECT id, name FROM permissions");

        $permisos_usuario = DB::select(
            "SELECT p.id, p.name 
            FROM permissions p 
            JOIN permission_user u 
            ON p.id = u.permission_id 
            WHERE u.user_id = ?", [$user]);

        foreach ($permisos as $permiso) { 
            foreach($permisos_usuario as $pu) { 
                if($permiso->id == $pu->id){

                    unset($permisos[$permiso->id - 1]);

                }
            }
        }
        $data = User::all();
        return view ('simpleViews.permisos.listar', [
            'permisos'=>$permisos,
            "permisos_usuario" => $permisos_usuario,
            "data" => $data]);
    }
}
