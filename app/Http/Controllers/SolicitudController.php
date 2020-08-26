<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;
use App\Proyecto;
use App\Solicitud;
use DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index()
    {
        //$solicitudes= \App\Solicitud::all();
        $solicitudes = DB::select(
            "SELECT * 
            FROM solicitud s 
            JOIN proyecto p 
            ON s.id = p.id");
        /*
        $solicitudes = DB::select(
            "SELECT * 
            FROM solicitud s 
            JOIN estado_de_solicitud es
            ON s.idS = es.idS
            WHERE estadoES=1"); //asumiendo que el estado 1 seria el de pendientes de aprobar */
        return view('proyectoViews.solicitud.Admin.index', ['solicitudes'=>$solicitudes]);
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
        return view('proyectoViews.solicitud.Investigador.crear', [
            'tiposinv' => $tiposinv,
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
        //dd(request()->all());
        //Validacion de los datos      
        request()->validate([
            'nombre'=> 'required',
            'tipoRec'=> 'required',
            'subtipo'=> 'required',
            'descripcion'=> 'required',     
            'costo'=> 'required'
        ],
        [
            'nombre.required' => "El nombre es obligatorio.",
            'tipoRec.required'=>"Elija el tipo de investigación",
            'subtipo.required' => "Elija el sutipo de investigación.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'costo.required' => "El costo es obligatorio.",
        ]);
        //Se asignan las variables al nuevo recurso
        $proyecto= new Proyecto();
        $proyecto->id_subtipo=request('subtipo');
        $proyecto->id_equipo=1;
        $proyecto->nombre=request('nombre');
        $proyecto->descripcion=request('descripcion');
        $proyecto->costo=request('costo');
        //Se crea el nuevo proyecto
        $proyecto->save();
        //Se asignan las variables al nuevo detalle recurso
        $solicitud=new Solicitud();
        $solicitud->id_proy=$proyecto->id;
        $solicitud->fecha= request('modelo');
        $solicitud->noti_inv= request('descripcion');
        $solicitud->noti_coo= request('descripcion');
        //Se crea el nuevo detalle recurso
        $solicitud->save();
        return redirect('/recursos');
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
