<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\ComiteUsuario;
use DB;

class ComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        
        //Todos los usuarios
        $users = DB::select("SELECT * FROM users");
        $noMiembros = DB::select("SELECT * FROM users");
      

        //Omitir Miembros del comite 
         $miembrosComite = DB::select('SELECT * FROM comite_usuario WHERE id_comite = ?', [$id]);

        foreach ($miembrosComite as $miembro) { 
            foreach($noMiembros as $user){ 
                if($user->id == $miembro->id_usuario){
                    unset($noMiembros[$user->id - 1]);
                }
            }
        }

          //Miembros del equipo 
           $miembros1= DB::select('SELECT * FROM users INNER JOIN comite_usuario 
           ON users.id = comite_usuario.id_usuario AND id_comite = ?', [$id]);

            $miembros= DB::select("SELECT CU.id_usuario, U.name, RU.role_id, R.name as name1 FROM users U 
            JOIN comite_usuario CU ON U.id = CU.id_usuario
            JOIN role_user RU ON U.id = RU.user_id 
            JOIN roles R ON R.id = RU.role_id
            WHERE CU.id_comite = ?", [$id]);
         
         //Roles
         $roles = DB::select('SELECT * FROM roles WHERE tipo_rol = ?', [false]);

         $cantidad_miembros = ComiteUsuario::count();

         //Retornar la vista
         return view ('evaluacion.comite.index', [
              'usuarios'=>$noMiembros,  
              'miembros'=>$miembros,
              'roles'=>$roles,
              'cantidad_miembros'=>$cantidad_miembros,
              'proyecto'=>$proyecto,
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
        $id_miembro = request('investigador');

        $cantidad_miembros = ComiteUsuario::count();

        if($cantidad_miembros < 3 ){

            DB::table('comite_usuario')->insert([
                'id_comite' => $id,
                'id_usuario' =>$id_miembro,     
            ]);
    
            return redirect()->route('comite.index',[$id]);

        }else{

            return redirect()->route('comite.index',[$id]);
        }

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
    public function destroy($id_usuario, $id_proyecto)
    {
        DB::table('comite_usuario')->where('id_usuario', $id_usuario)->where('id_comite', $id_proyecto)->delete();
        return redirect()->route('comite.index',[$id_proyecto]);
    }
}
