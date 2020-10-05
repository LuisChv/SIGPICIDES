<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Proyecto;
use DB;

class IndicadorController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_indicador'=> ['required', 'max:1000'],
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_indicador.required' => "Describa el objetivo.",
        ]);

        $indicador = new Indicador();
        $indicador->id_proy = request('id_proy');
        $indicador->detalle = request('descripcion_indicador');
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function update(){
        request()->validate([
            'descripcion_indicador'=> ['required', 'max:1000'],
        ],
        [
            'descripcion_indicador.required' => "Describa el objetivo.",
        ]);

        $indicador = Indicador::findOrFail(request('id_indicador'));
        $indicador->detalle = request('descripcion_indicador');
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function destroy(){
        $indicador = Indicador::findOrFail(request('indicador'));
        $indicador->delete();
        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function index($id){
        $proyecto= Proyecto::where('id', $id)->first();
        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);
        return view('proyectoViews.indicador.index', [
           'indicadores' => $indicadores,
        ]);
    }
}
