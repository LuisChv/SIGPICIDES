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
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_indicador.required' => "Describa el objetivo.",
            'indicador_tipo.required'=> "Seleccione un tipo de indicador",
        ]);

        $indicador = new Indicador();
        $indicador->id_proy = request('id_proy');
        $indicador->detalle = request('descripcion_indicador');
        $indicador->tipo = true;
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function destroy(){
        $indicador = Indicador::findOrFail(request('id'));
        $indicador->delete();
        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }
}
