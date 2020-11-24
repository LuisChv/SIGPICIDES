<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function misProyectos(){
        $user = auth()->user()->id;
        //return DB::table('permissions')->paginate(3);
        $proyectos = DB::table('proyecto')
                ->join('equipo_de_investigacion', 'proyecto.id_equipo','equipo_de_investigacion.id')
                ->join('usuario_equipo_rol', 'equipo_de_investigacion.id','usuario_equipo_rol.id_equipo')                
                ->select('proyecto.nombre','usuario_equipo_rol.id_rol', 'proyecto.id')                
                ->where([['id_usuario',$user],
                ['id_rol','=',5]])
                ->paginate(3);           
                
        return view ('proyectoViews.mis_proyectos.index', [
            'proyectos' => $proyectos
        ]);  
    }

    //Lista de proyectos donde el usuario ha colaborado
    public function indexColaboracion()
    {
        $idUsuarioLogeado=auth()->user()->id;
        //return DB::table('permissions')->paginate(3);
        $colaboraciones=DB::table('proyecto')
                ->join('equipo_de_investigacion', 'proyecto.id_equipo','equipo_de_investigacion.id')
                ->join('usuario_equipo_rol', 'equipo_de_investigacion.id','usuario_equipo_rol.id_equipo')                
                ->select('proyecto.nombre','usuario_equipo_rol.id_rol', 'proyecto.id')                
                ->where([['id_usuario',$idUsuarioLogeado],
                ['id_rol','!=',5]])
                ->paginate(3);           
                
        return view ('proyectoViews.Colaboraciones.index', ['colaboraciones'=>$colaboraciones]);                
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
    public function store(Request $request)
    {
        //
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
        //
    }
}
