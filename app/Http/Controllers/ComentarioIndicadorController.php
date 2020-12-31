<?php

namespace App\Http\Controllers;

use App\ComentarioIndicador;
use Illuminate\Http\Request;
use DB;

class ComentarioIndicadorController extends Controller
{
    public function guardarComentarios(Request $request){
        //dd([$request->request, $request->comentario, $request->idIndicador, auth()->user()->id]);
        //Validación de valores nulos
        if($request->comentario==''|| $request->comentario==null){
            return response()->json([                
                "Respuesta"=> 'Debe escribir un comentario',
            ]);
        }
        if($request->idIndicador==''|| $request->idIndicador==null ){
            return response()->json([                
                "Respuesta"=> 'Intento de hackeo',
            ]);
        }
        //Validación de tamaño de comentario
        if(strlen($request->comentario)>900){
            return response()->json([                
                "respuestaLarga"=> 'Comentario demasiado largo',
            ]);
        }
        //Verificiación de seguridad 
        //Solo miembros del comite (Coordinador y director) y el lider pueden añadir comentarios
        $proyecto=DB::table('proyecto')
            ->whereRaw('id= (select id_proy from indicador where id=?)', [$request->idIndicador])->first();
        if($proyecto){
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();            
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$lider && !$comite){
                return response()->json([                
                    "Respuesta"=> 'Inhabilitado',
                ]);
            }
        }
        //Agregar comentario
        $comentario = new ComentarioIndicador();
        $comentario->comentario=$request->comentario;
        $comentario->id_user=auth()->user()->id;
        $comentario->id_indicador=$request->idIndicador;
        $comentario->save();
        $comentario->usuario= auth()->user()->name;
        $comentario->id_user=null;
        $comentario->id=null;
        return response()->json([
            "comentario"=> $comentario,
            "Respuesta"=> 'Comentario guardado',
        ]);
    }
}
