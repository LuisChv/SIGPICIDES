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
        $sub_tipos= \App\SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();
        return view ('simpleViews.tipoInvestigacion.crear', [
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
    public function show(SubTipoDeInvestigacion $subTipoDeInvestigacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTipoDeInvestigacion $subTipoDeInvestigacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubTipoDeInvestigacion $subTipoDeInvestigacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubTipoDeInvestigacion  $subTipoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTipoDeInvestigacion $subTipoDeInvestigacion)
    {
        //
    }
}
