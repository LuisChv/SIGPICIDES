<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;

class IndicadorController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_indicador'=> 'required',
            'indicador_tipo'=> 'required',
            'indicador_cant'=> 'required',
            'indicador_avance'=> 'required',
            'indicador_tipo_grafico'=> 'required',
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_indicador.required' => "Describa el objetivo.",
            'indicador_tipo.required'=> "Seleccione un tipo de indicador",
            'indicador_cant.required'=> "Ingrese la cantidad de variables",
            'indicador_avance.required'=> "Ingrese el avance del indicador",
            'indicador_tipo_grafico.required'=> "Ingrese el avance del indicador",
        ]);

        $indicador = new Indicador();
        $indicador->id_proy = request('id_proy');
        $indicador->detalle = request('descripcion_indicador');
        $indicador->tipo = request('indicador_tipo');
        $indicador->cant_variables = request('indicador_cant');
        $indicador->descrip_avance = request('indicador_avance');
        $indicador->tipo_de_grafico = request('indicador_tipo_grafico');
        $indicador->finalizado = false;
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function destroy(){
        $indicador = Indicador::findOrFail(request('indicador'));
        $indicador->delete();
        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }
}
