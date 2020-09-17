<?php

namespace App\Http\Controllers;
use App\UsuarioEquipoRol;
use App\Proyecto;
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


    public function index($id)
    {
        
        $proyecto = Proyecto::where('id', $id)->first();

         //Todos los usuarios
         $users = DB::select("SELECT * FROM users");
         $noMiembros = DB::select("SELECT * FROM users");
       
 
         //Omitir Miembros del equipo 
          $miembrosEquipo = DB::select('SELECT * FROM usuario_equipo_rol WHERE id_equipo = ?', [$id]);
 
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
            $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [$id]);
          
          //Roles
          $roles = DB::select('SELECT * FROM roles WHERE tipo_rol = ?', [true]);
 
          //Retornar la vista
          return view ('proyectoViews.equipo.index', [
               'usuarios'=>$noMiembros,  
               'miembros'=>$miembros,
               'roles'=>$roles,
               'proyecto'=>$proyecto,
               'id_proyecto'=>$id,
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
    public function store($id)
    {
        $id_investigador = request('investigador');
        $role = Role::where('name', request('rolmiembro'))->first();;
        $rol_miembro = Role::where('name', request('rolmiembro'))->first();


        DB::table('usuario_equipo_rol')->insert([
            'id_equipo' => $id,
            'id_usuario' =>$id_investigador,    
            'id_rol'=>$role->id,
        ]);


        return redirect()->route('miembros.index',[$id]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update($id)
    {
        /*
        $id=request('id_proy');
        $id_investigador = request('investigador');
        $role = Role::where('name', request('rolmiembro'))->first();;
        $rol_miembro = Role::where('name', request('rolmiembro'))->first();


        DB::table('usuario_equipo_rol')->where('id_investigador', $id_investigador)->update([    
            'id_rol'=>$role->id,
        ]);


        return redirect()->route('miembros.index',[$id]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario,$id_proyecto)
    {
         DB::table('usuario_equipo_rol')->where('id_usuario', $id_usuario)->where('id_equipo', $id_proyecto)->delete();
         return redirect()->route('miembros.index',[$id_proyecto]);
    }
}
