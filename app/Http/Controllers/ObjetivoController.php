<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivo;

class ObjetivoController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_objetivo'=> ['required', 'max:1000'],
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_objetivo.required' => "Describa el objetivo.",
            'descripcion_objetivo.max' => "No se permiten mas de 1000 caractéres.",
        ]);

        $objetivo = new Objetivo();
        $objetivo->id_proyecto = request('id_proy');
        $objetivo->descripcion = request('descripcion_objetivo');
        $objetivo->save();

        return redirect()->route('proyecto.oai', [$objetivo->id_proyecto]);
    }

    public function update(){
        request()->validate([
            'descripcion_objetivo'=> ['required', 'max:1000'],
        ],
        [
            'descripcion_objetivo.required' => "Describa el objetivo.",
        ]);

        $objetivo = Objetivo::findOrFail(request('id_objetivo'));
        $objetivo->descripcion = request('descripcion_objetivo');
        $objetivo->save();

        return redirect()->route('proyecto.oai', [$objetivo->id_proyecto]);
    }

    public function destroy(){
        $objetivo = Objetivo::findOrFail(request('objetivo'));
        $objetivo->delete();
        return redirect()->route('proyecto.oai', [$objetivo->id_proyecto]);
    }
}
