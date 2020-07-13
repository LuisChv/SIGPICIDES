<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoInvestigacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos=\App\TipoDeInvestigacion::all();
        $sub_tipos= \App\SubTipoDeInvestigacion::all();
        return view('simpleViews.tipoInvestigacion.listar',[
            'tipos'=> $tipos,
            'sub_tipos' => $sub_tipos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=\App\TipoDeInvestigacion::all();
        $sub_tipos= \App\SubTipoDeInvestigacion::all();
        return view ('simpleViews.tipoInvestigacion.crearTipo',[
            'tipos'=> $tipos,
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
            'nombre'=> 'required'            
        ]);
        $tipo= new \App\TipoDeInvestigacion();
        $tipo->nombre= request('nombre');
        $tipo->save();
        return redirect(route('tipo_investigacion.index'));
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
