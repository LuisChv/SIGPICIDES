<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Proyecto;
use App\UsuarioEquipoRol;
use App\Indicador;
use App\User;
use App\tareaUsuario;
use App\TareaIndicador;
use App\Solicitud;
use DB;

class TaskController extends Controller
{

    public function index($idProyecto)
    {   
        //hay que verificar si el proyecto que se esta llamando es uno en el que la persona logeada sea parte del equipo
        //Trayendo el id del equipo del proyecto de la base de datos
        //Si el equipo existe sigue el flujo, sino se muestra un not found
        if ($proyecto= Proyecto::select('id_equipo', 'id_comite')->where('id',$idProyecto)->first()) {
            //Obteniendo datos del usuario logeado
            $solicitud= Solicitud::select('id_estado')->where('id_proy', $idProyecto)->first();
            //Validacion para que solo permita modificar perfiles aprobados
            if($solicitud->id_estado==5){}
            //else{ abort(404);}
            $idUsuarioLogeado=auth()->user()->id;
            //En caso sea miembro del comite se mostrara el gant pero no se podra modificar
            //Comprobando si el usuario equipo rol existe (id del equipo y id del usuario logeado)
            $opcion;
            if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $proyecto->id_equipo)->where('id_usuario', $idUsuarioLogeado)->first()){
                $opcion=1;
            }
            elseif($usuarioComite= ComiteUsuario::where('id_comito',$proyecto->id_comite)->where('id_usuario', $idUsuarioLogeado)){
                $opcion=2;
            }
            else{abort(403);}
            //Traer los indicadores del proyecto seleccionado
            $indicadores= Indicador::where('id_proy',$idProyecto)->get();
            //Traer los miembros del equipo del proyecto seleccionado
            $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$proyecto->id_equipo])->get();
            //dd($indicadores);
            //Retornar vista
            if($opcion==1){
                return view('proyectoViews.tareas.gantt',['idProyecto'=>$idProyecto, 'indicadores'=>$indicadores, 'miembrosEquipo'=>$miembrosEquipo]);
            }
            elseif($opcion==2){
                return view('proyectoViews.tareas.ganttComite',['idProyecto'=>$idProyecto, 'indicadores'=>$indicadores, 'miembrosEquipo'=>$miembrosEquipo]);
            }           
        }
        else {
            abort(404);
        }
        

    }

    public function store(Request $request){
        //Se verifica si existe el idProyecto recibido y si pertenece al usuario logeado
        //Se verifica que el proyecto exista en base
        if ($idEquipo= Proyecto::select('id_equipo')->where('id', $request->idProyecto)->first()) {
            //Obteniendo el id del usuario que guardo la tarea
            $idUsuarioLogeado=$request->idUser;
            //$usa=auth()->user()->id;
            //Entrara en el proceso si el usuario logeado pertenece al equipo del proyecto seleccionado
            if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idUsuarioLogeado)->first()){
                $task = new Task(); 
                $task->text = $request->text;
                // $task->rrhh = $request->rrhh;
                $task->start_date = $request->start_date;
                $task->duration = $request->duration;
                $task->progress = $request->has("progress") ? $request->progress : 0;
                $task->parent = $request->parent;
                $task->sortorder = Task::max("sortorder") + 1;
                $task->id_proyecto = $request->idProyecto;
                $task->type=$request->type;
                $task->readonly;
                $task->modificable;
                $task->save();
                
                /**********Guardar asignacion de tareas a miembros del equipo***************/
                //Hacer el proceso en caso haya seleccionado al menos un miembro
                
                if(strlen($request->miembros)>2){  
                    //Convertir el string recibido a un array con la funcion "StringToArray"                  
                    $miembros= $this->stringToArray($request->miembros);
                    foreach ($miembros as $idMiembro) {
                        //Verificar que los valores de los id's recibidos sean de Usuarios que pertenencen al equipo del proyecto
                        if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idMiembro*1)->first()){
                            $tareaDeUsuario= new tareaUsuario();
                            $tareaDeUsuario->id_usuario=$idMiembro;
                            $tareaDeUsuario->id_task=$task->id;
                            $tareaDeUsuario->save();                            
                        }
                    }
                }
                $tareausuarios= tareaUsuario::select('id')->get();
                /**********Guardar asignacion de tareas a indicadores***************/
                //Hacer el proceso en caso haya seleccionado al menos un inidicador
                if(strlen($request->indicadores)>2){
                    $indicadores= $this->stringToArray($request->indicadores);
                    foreach ($indicadores as $idIndicador) {
                        //Verificar que los indicadores recibidos pertenezcan al proyecto seleccionado
                        if($indicador= Indicador::where('id_proy',$request->idProyecto)->where('id', $idIndicador)->first()){
                            $indicadorTarea= new TareaIndicador;                            
                            $indicadorTarea->id_indicador=$idIndicador;
                            $indicadorTarea->id_task=$task->id;
                            $indicadorTarea->save();                            
                        }
                    }
                }
                return response()->json([
                "action"=> "inserted",
                "tid" => $task->id,
                "type"=> $task->type,
                //"String recibido"=> $miembros,
                //"tipo de consulta"=> gettype($tareausuarios),
                //"consulta"=> $tareausuarios->id,
                // "tipo del String recibido"=>gettype($miembros),
                // "valor [1] array"=>$miembros[1],
                // "tipo del valor [1]"=>gettype($miembros[1]),
                // "valor [1] parsed Int"=>(int)$miembros[1],
                // "valor [0] array"=>$miembros[0],
                // "valor [0] parsed Int"=>$miembros[0]*1,
                // "indicadors"=>$request->indicadores,
                ]);
            }
        } 
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
        
        /**********Guardar asignacion de tareas a miembros del equipo***************/
        //Hacer el proceso en caso haya seleccionado al menos un miembro
        tareaUsuario::where('id_task',$task->id)->delete();
        if(strlen($request->miembros)>2){  
            //Convertir el string recibido a un array con la funcion "StringToArray"                  
            $miembros= $this->stringToArray($request->miembros);                    
            foreach ($miembros as $idMiembro) {
                //Verificar que los valores de los id's recibidos sean de Usuarios que pertenencen al equipo del proyecto
                if($usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $idEquipo->id_equipo)->where('id_usuario', $idMiembro*1)->first()){
                    //Se le asigna la tarea a los miembros seleccionados
                    $tareaDeUsuario= new tareaUsuario();
                    $tareaDeUsuario->id_usuario=$idMiembro;
                    $tareaDeUsuario->id_task=$task->id;
                    $tareaDeUsuario->save();                           
                }                      
            }
        }
        /**********Guardar asignacion de tareas a indicadores***************/
        //Hacer el proceso en caso haya seleccionado al menos un inidicador
        TareaIndicador::where('id_task', $task->id)->delete();
        if(strlen($request->indicadores)>2){
            $indicadores= $this->stringToArray($request->indicadores);                    
            foreach ($indicadores as $idIndicador) {
                //Verificar que los indicadores recibidos pertenezcan al proyecto seleccionado
                if($indicador= Indicador::where('id_proy',$request->idProyecto)->where('id', $idIndicador)->first()){
                    $indicadorTarea= new TareaIndicador;                            
                    $indicadorTarea->id_indicador=$idIndicador;
                    $indicadorTarea->id_task=$task->id;
                    $indicadorTarea->save();                            
                }
            }
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

    public function stringToArray($string){
        $array = str_replace ( "[", '', $string);
        $array= str_replace ( "]", '', $array);
        $array= str_replace ( '"', '', $array);
        $array = explode(',', $array);
        return $array;
    }

    //Controlador para traer los miembros asignados a una tarea
    public function tareaAsignacionesFetch($id_task){
        $encargados=0;
        $indicadoresT=0;
        $encargados= tareaUsuario::select('id', 'id_usuario')->where('id_task', $id_task*1 )->get();
        $indicadoresT= TareaIndicador::select('id', 'id_indicador')->where('id_task', $id_task*1)->get();         
        return response()->json([
            "encargados"=> $encargados,
            "indicadores"=> $indicadoresT,
            "id_task"=>$id_task,
        ]);
    }
}