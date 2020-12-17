<?php
namespace App\Http\Controllers;

use App\ComentarioTarea;
use DB;

use Illuminate\Http\Request;

class ComentarioTareaController extends Controller
{
    public function traerComentarios($id_task){
        $comentarios = ComentarioTarea::where('id_task', $id_task*1)
        ->join('users', 'comentario_tarea.id_user', 'users.id')
        ->select('comentario_tarea.*', 'users.name')
        ->orderBy('comentario_tarea.created_at')
        ->get();
        return response()->json([
            "comentarios"=> $comentarios,
        ]);
    }    
    public function guardarComentarios(Request $request){
        //dd([$request->request, $request->comentario, $request->idTask]);
        //Validación de valores nulos
        if($request->comentario==''|| $request->comentario==null){
            return response()->json([                
                "Respuesta"=> 'Debe escribir un comentario',
            ]);
        }
        if($request->idTask==''|| $request->idTask==null || $request->idUser==''|| $request->idUser==null){
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
            ->whereRaw('id= (select id_proyecto from tasks where id=?)', [$request->idTask])->first();
        if($proyecto){
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',$request->idUser],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();            
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',$request->idUser],['id_comite',$proyecto->id_comite]])->first();
            if(!$lider && !$comite){
                return response()->json([                
                    "Respuesta"=> 'Inhabilitado',
                ]);
            }
        }
        //Agregar comentario
        $comentario = new ComentarioTarea();
        $comentario->comentario=$request->comentario;
        $comentario->id_user=$request->idUser;
        $comentario->id_task=$request->idTask;
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
