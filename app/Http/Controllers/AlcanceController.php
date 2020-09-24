<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alcance;

class AlcanceController extends Controller
{
    public function store(){
        request()->validate([
            'id_proy'=> 'required',
            'descripcion_alcance'=> ['required', 'max:1000'],
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_alcance.required' => "Describa el objetivo.",
        ]);

        $alcance = new Alcance();
        $alcance->id_proyecto = request('id_proy');
        $alcance->descripcion = request('descripcion_alcance');
        $alcance->save();

        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }

    public function update(){
        request()->validate([
            'descripcion_alcance'=> ['required', 'max:1000'],
        ],
        [
            'descripcion_alcance.required' => "Describa el objetivo.",
        ]);

        $alcance = Alcance::findOrFail(request('id_alcance'));
        $alcance->descripcion = request('descripcion_alcance');
        $alcance->save();

        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }

    public function destroy(){
        $alcance = Alcance::findOrFail(request('alcance'));
        $alcance->delete();
        return redirect()->route('proyecto.oai', [$alcance->id_proyecto]);
    }
}
