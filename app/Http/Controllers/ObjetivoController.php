<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetivo;

class ObjetivoController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_objetivo'=> 'required',
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_objetivo.required' => "Describa el objetivo.",
        ]);

        $objetivo = new Objetivo();
        $objetivo->id_proyecto = request('id_proy');
        $objetivo->descripcion = request('descripcion_objetivo');
        $objetivo->save();

        return redirect()->route('proyecto.oai', [$objetivo->id_proyecto]);
    }

    public function update($id){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_objetivo'=> 'required',
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_objetivo.required' => "Describa el objetivo.",
        ]);

        $objetivo = Objetivo::findOrFail($id);
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
