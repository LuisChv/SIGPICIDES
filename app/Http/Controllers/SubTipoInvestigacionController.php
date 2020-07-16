<?php

namespace App\Http\Controllers;

use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;
use Illuminate\Http\Request;

class SubTipoInvestigacionController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_tipos= SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();
        return view ('simpleViews.subtipoInvestigacion.crear', [
            'tiposinv' => $tiposinv,
            'tipos'=> $tiposinv,
            'sub_tipos' => $sub_tipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre'=> 'required',
            'tipoRec'=> 'required'            
        ],
        [
            'tipoRec.required' => "Seleccione un tipo de investigación2.",
            'nombre.required' => "El nombre es obligatorio.",
        ]);
        $subtipo= new SubTipoDeInvestigacion();
        $subtipo->id_tipo=request('tipoRec');
        $subtipo->nombre=request('nombre');
        $subtipo->save();
        
        return redirect(route('tipo_investigacion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function show(SubTipoDeInvestigacion $subtipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTipoDeInvestigacion $subtipo)
    {
        $sub_tipos= SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();
        return view('simpleViews.subtipoInvestigacion.editar', [
            'subtipo'=>$subtipo,
            'tipos'=> $tiposinv,
            'tiposinv' => $tiposinv,
            'sub_tipos' => $sub_tipos
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTipoDeInvestigacion $subtipo)
    {
        request()->validate([
            'nombre'=> 'required',
            'tipoRec'=> 'required'            
        ],
        [
            'tipoRec.required' => "Seleccione un tipo de recurso.",
            'nombre.required' => "El nombre es obligatorio.",
        ]);
        $subtipo->id_tipo=request('tipoRec');
        $subtipo->nombre=request('nombre');
        $subtipo->save();
        return redirect(route('tipo_investigacion.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTipoDeInvestigacion $subtipo)
    {
        $subtipo->delete();
        return redirect(route('tipo_investigacion.index'));
    }
}
