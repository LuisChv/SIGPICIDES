<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Task;
use App\Proyecto;
use App\UsuarioEquipoRol;
use DB;
 
class TaskController extends Controller
{

    public function index($idProyecto)
    {   
        //hay que verificar si el proyecto que se esta llamando es uno en el que la persona logeada sea parte del equipo
        //Trayendo el id del equipo del proyecto de la base de datos
        //Si el equipo existe sigue el flujo, sino se muestra un not found
        if ($idEquipo= Proyecto::select('id_equipo')->where('id',$idProyecto)->first()) {
            //Obteniendo datos del usuario logeado
            $idUsuarioLogeado=auth()->user()->id;
            //dd($idUsuarioLogeado);            
            //dd($idEquipo);
            //Comprobando si el usuario equipo rol existe (id del equipo y id del usuario logeado)
            $usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idUsuarioLogeado)->firstOr(function(){
                abort(403);
            });

            return view('proyectoViews.tareas.gantt',['idProyecto'=>$idProyecto]);
        }
        else {
            abort(404);
        }
        

    }

    public function store(Request $request){
 
        $task = new Task();
 
        $task->text = $request->text;
       // $task->rrhh = $request->rrhh;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
        $task->sortorder = Task::max("sortorder") + 1;
        $task->id_proyecto = 2;
        $task->type;
        $task->readonly;
        $task->modificable;
        $task->save();
 
        return response()->json([
            "action"=> "inserted",
            "tid" => $task->id
        ]);
    }
 
    public function update($id, Request $request){
        $task = Task::find($id);
 
        $task->text = $request->text;
        $task->start_date = $request->start_date;
        $task->duration = $request->duration;
        $task->progress = $request->has("progress") ? $request->progress : 0;
        $task->parent = $request->parent;
 
        $task->save();
 
        if($request->has("target")){
            $this->updateOrder($id, $request->target);
        }

        return response()->json([
            "action"=> "updated"
        ]);
    }
 
    private function updateOrder($taskId, $target){
        $nextTask = false;
        $targetId = $target;
     
        if(strpos($target, "next:") === 0){
            $targetId = substr($target, strlen("next:"));
            $nextTask = true;
        }
     
        if($targetId == "null")
            return;
     
        $targetOrder = Task::find($targetId)->sortorder;
        if($nextTask)
            $targetOrder++;
     
        Task::where("sortorder", ">=", $targetOrder)->increment("sortorder");
     
        $updatedTask = Task::find($taskId);
        $updatedTask->sortorder = $targetOrder;
        $updatedTask->save();
    }
    
    public function destroy($id){
        $task = Task::find($id);
        $task->delete();
 
        return response()->json([
            "action"=> "deleted"
        ]);
    }
}