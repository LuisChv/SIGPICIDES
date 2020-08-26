<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recursos;
use App\Proyecto;
use App\TipoDeRecursos;
use App\RecursosPorProy;
use DB;
class RecursoProyectoController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)//
    {
        /**
            *id
            *id_recurso
            *id_proyecto
            *detalle
            *modificable
            *cantidad
            *timestamp
         */
        $proyecto=Proyecto::findOrFail($id);
        $recursos=Recursos::all();
        $tiposrec=TipoDeRecursos::all();
        $recursosProy=DB::select("SELECT * FROM recursos_por_proy RP JOIN recurso R ON R.id = RP.id_recurso WHERE RP.id_proy = ?", [$id]);
        return view ('proyectoViews.recurso.asignar', [
            'proyecto'=>$proyecto,
            'tiposrec'=>$tiposrec,
            'recursos'=>$recursos,
            'recursosProy'=>$recursosProy,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store()
    {

        //Validacion de los datos      
        request()->validate([
            'recurso'=> 'required',
            'proyecto'=> 'required',
            'detalle'=> 'required',
            'cantidad'=> 'required',
        ],
        [
            'recurso.required' => "Seleccione un recurso.",
            'proyecto.required' => "Seleccione un proyecto.",
            'detalle.required' => "Ingrese el detalle del recurso.",
            'cantidad.required' => "Ingrese la cantidad.",
        ]);

        $r = new RecursosPorProy;
        $r->id_proy = request('proyecto');
        $r->id_recurso = request('recurso');
        //$r->detalle = request('detalle');
        $r->cantidad = request('cantidad');
        $r->save();
        
        return redirect()->route('proyecto_recursos.create', [$r->id_proy]);
    }

    public function show($id)
    {
        $recurso=DB::select(
            "SELECT * FROM recursos_por_proy RP JOIN recurso R ON R.id = RP.id_recurso WHERE RP.id = ?", [$id]);

        //Retornar la vista
        return view ('simpleViews.recursos.show', [
            'recurso'=>$recurso]);
    }

    public function destroy($id)
    {
        $recursoProy= \App\RecursosPorProy::findOrFail($id);
        $recursoPry->delete();
        return redirect('/recursos');
    }

}