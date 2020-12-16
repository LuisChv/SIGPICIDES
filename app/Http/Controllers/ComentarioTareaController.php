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
    
}
