<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $recursos= \App\Recursos::all();
        $tiposrec= \App\TipoDeRecursos::all();
        return view ('simpleViews.recursos.listar', ['recursos'=>$recursos, 'tiposrec'=>$tiposrec]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recursos= \App\Recursos::all();
        $marcas=\App\Marca::all();
        $tiporec=\App\TipoDeRecursos::all();
        return view ('simpleViews.recursos.crear', [
            'marcas' => $marcas, 
            'tiposrec' => $tiporec,
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
        ]);
        //Se asignan las variables al nuevo recurso
        $recurso= new \App\Recursos();
        $marca= \DB::table('marca')->where('nombre', request('marca'))->first();
        $tipo= \DB::table('tipo_de_recurso')->where('nombre', request('tipoRec'))->first(); 
        $recurso->id_marca=$marca->id;
        $recurso->id_tipo=$tipo->id;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $recursos= \App\Recursos::all();
        $tiposrec= \App\TipoDeRecursos::all();
        //Buscar el recurso con el id de entrada
        $recurso= \App\Recursos::findOrFail($id);
        $detalleRecurso= \App\DetalleDeRecurso::where('id_recurso', $id)->first();
        //Buscar el detalle del recurso del recurso consultado
        $detalleRecurso= \App\DetalleDeRecurso::where('id_recurso', $id)->first();
        //Buscar nombre de marca y tipo de recurso
        $tiporec=\App\TipoDeRecursos::findOrFail($recurso->id_tipo);
        $marca=\App\Marca::findOrFail($recurso->id_marca);
        //Asignarlos
        $recurso->id_tipo=$tiporec->nombre;
        $recurso->id_marca=$marca->nombre;
        //Retornar la vista
        return view ('simpleViews.recursos.show', [
            'recurso'=>$recurso,
            'detalle'=>$detalleRecurso,
            'recursos'=>$recursos,
            'tiposrec'=>$tiposrec]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recursos= \App\Recursos::all();
        //Buscar marcas para los select
        $marcas=\App\Marca::all();
        $tiporec=\App\TipoDeRecursos::all();
        //Buscar recurso y su respectivo detalle
        $recurso= \App\Recursos::findOrFail($id);
        $detalleRecurso= \App\DetalleDeRecurso::where('id_recurso', $id)->first();
        return view ('simpleViews.recursos.editar',[
            'recurso'=>$recurso, 
            'detalle'=>$detalleRecurso, 
            'marcas' => $marcas, 
            'tiposrec' => $tiporec,
            'recursos'=>$recursos]);
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
        request()->validate([
            'tipoRec'=> 'required',
            'nombre'=> 'required',
            'marca'=> 'required',
            'modelo'=> 'required',
            'descripcion'=> 'required'
        ]);
        //Se asignan las variables al nuevo recurso
        //$recurso= \DB::table('recurso')->where('id', $id)->first();
        $recurso= \App\Recursos::findOrFail($id);
        $marca= \DB::table('marca')->where('nombre', request('marca'))->first();
        $tipo= \DB::table('tipo_de_recurso')->where('nombre', request('tipoRec'))->first(); 
        $recurso->id_marca=$marca->id;
        $recurso->id_tipo=$tipo->id;
        $recurso->nombre=request('nombre');
        //Se crea el nuevo recurso
        $recurso->save();
        //Se asignan las variables al nuevo detalle recurso
        $detalleRecurso= \App\DetalleDeRecurso::where('id_recurso', $id)->first();
        $detalleRecurso->id_recurso=$recurso->id;
        $detalleRecurso->modelo= request('modelo');
        $detalleRecurso->descripcion= request('descripcion');
        //Se crea el nuevo detalle recurso
        $detalleRecurso->save();
        return redirect('/recursos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recurso= \App\Recursos::findOrFail($id);
        $detalleRecurso= \App\DetalleDeRecurso::where('id_recurso', $id)->first();
        $recurso->delete();
        $detalleRecurso->delete();
        return redirect('/recursos');
    }
}
