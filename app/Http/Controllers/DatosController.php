<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Variable;
use App\ValorEje;

class DatosController extends Controller
{
    public function barra(){
        $indicador = Indicador::findOrFail(request('indicador'));
        $variables = Variable::where('id_indicador', $indicador->id)->get();
        foreach($variables as $variable){
            $valor_eje = ValorEje::where('id_variable', $variable->id)->first();

            if($valor_eje == null){
                $valor_eje = new ValorEje();
                $valor_eje->id_variable = $variable->id;
                $valor_eje->valor_y = request($variable->id);
                $valor_eje->save();
            }
            else{
                $valor_eje->valor_y = request($variable->id);
                $valor_eje->save();
            }
        }
        return redirect()->back();
    }
}
