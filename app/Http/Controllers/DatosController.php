<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Variable;
use App\ValorEje;
use DB;

class DatosController extends Controller
{
    public function barra(){
        $indicador = Indicador::findOrFail(request('indicador'));

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

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

    public function linea(){
        $indicador = Indicador::findOrFail(request('indicador'));

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $variables = Variable::where('id_indicador', $indicador->id)->get();
        foreach($variables as $variable){
            $valor_eje = ValorEje::where('id_variable', $variable->id)->get();
            foreach($valor_eje as $valor){
                $valor->valor_x = request("x".$valor->id);
                $valor->valor_y = request("y".$valor->id);
                $valor->save();
            }
            
        }
        return redirect()->back();
    }

    public function punto(){
        $variable = Variable::findOrFail(request('variable'));

        $indicador = Indicador::findOrFail($variable->id_indicador);

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $valor_eje = new ValorEje();
        $valor_eje->id_variable = request('variable');
        $valor_eje->valor_x = request('x');
        $valor_eje->valor_y = request('y');
        $valor_eje->save();
        return redirect()->back();
    }
}
