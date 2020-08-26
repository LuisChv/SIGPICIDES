<?php

namespace App\Http\Controllers;
use App\UsuarioEquipoRol;
use Caffeinated\Shinobi\Models\Role;
use DB;

use Illuminate\Http\Request;

class UsuarioEquipoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         //Todos los usuarios
         $users = DB::select("SELECT * FROM users");
         $noMiembros = DB::select("SELECT * FROM users");
       
 
         //Omitir usuario investigador lider(Usuario Logeado)
         $lider = auth()->user();
 
         foreach ($noMiembros as $user){ 
             if($user->id == $lider->id){
                // unset($noMiembros[$user->id - 1]);
             }
         }
 
         //Omitir Miembros del equipo 
          $miembrosEquipo = DB::select('SELECT * FROM usuario_equipo_rol WHERE id_equipo = ?', [1]);
 
         foreach ($miembrosEquipo as $miembro) { 
             foreach($noMiembros as $user){ 
                 if($user->id == $miembro->id_usuario){
                     unset($noMiembros[$user->id - 1]);
                 }
             }
         }
 
          //Omitir Otros roles. No investigadores
          $noInvestigadores= DB::select('SELECT * FROM role_user WHERE role_id != ?', [4]);
  
          foreach ($noInvestigadores as $inv) { 
              foreach($noMiembros as $user){ 
                  if($user->id == $inv->user_id){
                      unset($noMiembros[$user->id - 1]);
                  }
              }
          }
 
           //Miembros del equipo 
           $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [1]);
          
          //Roles
          $roles = DB::select('SELECT * FROM roles WHERE tipo_rol = ?', [true]);
 
          //Retornar la vista
          return view ('proyectoViews.equipo.index', [
               'usuarios'=>$noMiembros,  
               'miembros'=>$miembros,
               'roles'=>$roles,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $id_investigador = request('investigador');
        $role = Role::where('name', request('rolmiembro'))->first();;
        $rol_miembro = Role::where('name', request('rolmiembro'))->first();


        //Validacion temporal para id_equipo
        $equipo = DB::select('SELECT * FROM equipo_de_investigacion');

    
        if($equipo==null){
            DB::table('equipo_de_investigacion')->insert([
                'haylider'=> false,
            ]);
    
        }

        DB::table('usuario_equipo_rol')->insert([
            'id_equipo' => 1 ,
            'id_usuario' =>$id_investigador,
            'id_rol'=>$role->id,
        ]);


        return redirect('/miembros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('usuario_equipo_rol')->where('id_usuario', $id)->delete();
         return redirect('/miembros');
    }
}
