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
    //TODO seguridad en el metodo
    public function guardarComentarios(Request $request){
        //dd([$request->request, $request->comentario, $request->idTask]);
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
        $comentario = new ComentarioTarea();
        $comentario->comentario=$request->comentario;
        $comentario->id_user=$request->idUser;
        $comentario->id_task=$request->idTask;
        $comentario->save();
        $comentario->usuario= auth()->user()->name;
        return response()->json([
            "comentario"=> $comentario,
            "Respuesta"=> 'Comentario guardado',
        ]);
    }
    
    
}
