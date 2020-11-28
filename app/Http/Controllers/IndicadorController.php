<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Proyecto;
use App\Variable;
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
        $variables = DB::select(
            "SELECT V.id, V.id_indicador, V.modificable, V.nombre, V.color, VE.valor_y FROM variable V
            LEFT JOIN valor_eje VE ON V.id = VE.id_variable
            WHERE id_indicador IN (SELECT id FROM indicador WHERE id_proy = ?)
            ORDER BY V.id", [$id]);

        return view('proyectoViews.indicador.index', [
           'indicadores' => $indicadores,
           'variables' => $variables
        ]);
    }

    public function cambiar_tipo($id){
        $indicador = Indicador::findOrFail($id);
        $indicador->tipo = !$indicador->tipo;
        $indicador->save();
        return redirect()->back();
    }

    public function cambiar_tipo_grafico($id){
        $indicador = Indicador::findOrFail($id);
        $indicador->tipo_de_grafico = !$indicador->tipo_de_grafico;
        $indicador->save();
        return redirect()->back();
    }

    public function variable(){
        $variable = new Variable();
        $variable->id_indicador = request('id_indicador');
        $variable->color = request('color');
        $variable->nombre = request('nombre');
        $variable->save();
        return redirect()->back();
    }

    public function destroy_variable(){
        $variable = Variable::findOrFail(request('variable'));
        $variable->delete();
        return redirect()->back();
    }

    public function confirmar($id){
        $indicador = Indicador::findOrFail($id);
        $indicador->modificable = false;
        $indicador->save();
        return redirect()->back();
    }
}
