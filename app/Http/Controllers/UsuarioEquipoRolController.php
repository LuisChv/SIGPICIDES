<?php

namespace App\Http\Controllers;
use App\UsuarioEquipoRol;
use App\Proyecto;
use App\EquipoDeInvestigacion;
use Caffeinated\Shinobi\Models\Role;
use DB;
use App\Solicitud;

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
        $solicitud= Solicitud::where('id_proy', $id)->first();
        if(!($solicitud->id_estado==5 || ($solicitud->id_estado==6 && $solicitud->etapa==2))){
            abort(403);
        }
        $proyecto = Proyecto::where('id', $id)->first();
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);

        $id_equipo = $proyecto->id_equipo;

         //Todos los usuarios
         $users = DB::select("SELECT * FROM users");
         $noMiembros = DB::select("SELECT * FROM users");
       
 
         //Omitir Miembros del equipo 
          $miembrosEquipo = DB::select('SELECT * FROM usuario_equipo_rol WHERE id_equipo = ?', [$id_equipo]);
 
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

          //Omitir Experto
          $evaluadores= DB::select('SELECT * FROM comite_usuario');
  
          foreach ($evaluadores as $eva) { 
              foreach($noMiembros as $user){ 
                  if($user->id == $eva->id_usuario){
                      unset($noMiembros[$user->id - 1]);
                  }
              }
          }
 
           //Miembros del equipo 
            $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [$id_equipo]);
          
          //Roles
          $roles = DB::select('SELECT * FROM roles');

          $cantidad_miembros = DB::table('usuario_equipo_rol')->where('id_equipo',[$equipo->id])->count();

 
          //Retornar la vista
          return view ('proyectoViews.equipo.index', [
               'usuarios'=>$noMiembros,  
               'miembros'=>$miembros,
               'roles'=>$roles,
               'proyecto'=>$proyecto,
               'id_proyecto'=>$id,
               'equipo'=>$equipo,
               'cantidad_miembros'=>$cantidad_miembros,
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
        $proyecto = Proyecto::where('id', $id)->first();

        $id_equipo = $proyecto->id_equipo;
        $id_investigador = request('investigador');
        $role = Role::where('name', request('rolmiembro'))->first();;
        $rol_miembro = Role::where('name', request('rolmiembro'))->first();


        DB::table('usuario_equipo_rol')->insert([
            'id_equipo' => $id_equipo,
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
