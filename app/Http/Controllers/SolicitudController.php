<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //TODO 
    public function index()
    {
        //$solicitudes= \App\Solicitud::all();
        /*
        $solicitudes = DB::select(
            "SELECT * 
            FROM solicitud s 
            JOIN estado_de_solicitud es
            ON s.idES = es.idES
            WHERE estadoES=1"); //asumiendo que el estado 1 seria el de pendientes de aprobar */
        /*$solicitud = DB::select(
            "SELECT * 
            FROM proyecto p 
            JOIN (SELECT * 
            FROM solicitud s 
            JOIN estado_de_solicitud es
            ON s.idES = es.idES
            WHERE estadoES=1) solicitudes
            ON p.idPR = solicitudes.idPR");
            //este es en caso de que el nombre se almacene en la tabla proyectos*/
        return view('proyectoViews.solicitud.index');
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
