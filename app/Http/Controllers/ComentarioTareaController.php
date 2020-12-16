<?php
namespace App\Http\Controllers;

use App\ComentarioTarea;
use DB;

use Illuminate\Http\Request;

class ComentarioTareaController extends Controller
{
    public function traerComentarios($id_task){
        $comentarios = ComentarioTarea::where('id_task', $id_task*1)->orderBy('created_at')->get();
        return response()->json([
            "comentarios"=> $comentarios,
        ]);
    }
    
}
