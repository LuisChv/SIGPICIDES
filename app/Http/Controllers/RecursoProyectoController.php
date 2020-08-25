<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recursos;
use App\Proyecto;
use App\TipoDeRecursos;
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
        return view ('proyectoViews.recurso.asignar', [
            'proyecto'=>$proyecto,
            'tiposrec'=>$tiposrec,
            'recursos'=>$recursos,
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
        //dump(request()->all());  //trae todo lo del formulario
        //dd($recurso);
        //Validacion de los datos      
        request()->validate([
            'tipoRec'=> 'required',
            'nombre'=> 'required',
            'marca'=> 'required',
            'modelo'=> 'required',
            'descripcion'=> 'required'
        ],
        [
            'tipoRec.required' => "Seleccione un tipo de recurso.",
            'nombre.required' => "El nombre es obligatorio.",
            'marca.required' => "Seleccione una marca.",
            'modelo.required' => "El modelo es obligatorio.",
            'descripcion.required' => "La descripcion es obligatoria.",
        ]);
        //Se asignan las variables al nuevo recurso
        $recurso= new \App\Recursos();
        $recurso->id_marca=request('marca');
        $recurso->id_tipo=request('tipoRec');
        $recurso->nombre=request('nombre');
        //Se crea el nuevo recurso
        $recurso->save();
        //Se asignan las variables al nuevo detalle recurso
        $detalleRecurso=new \App\DetalleDeRecurso();
        $detalleRecurso->id_recurso=$recurso->id;
        $detalleRecurso->modelo= request('modelo');
        $detalleRecurso->descripcion= request('descripcion');
        //Se crea el nuevo detalle recurso
        $detalleRecurso->save();
        return redirect('/recursos');
    }

}
