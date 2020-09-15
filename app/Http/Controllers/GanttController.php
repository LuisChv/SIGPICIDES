<?php
namespace App\Http\Controllers;
use App\Task;
use App\Link;
//use App\Empleado;
//La ruta de este controlador esta en api.php
class GanttController extends Controller
{
    public function get($id_proyecto){
        $tasks = new Task();
        $links = new Link();
        //$empleados = new Empleado(); 
        //Aqui es donde se mandan los datos de las tareas al gantt
        return response()->json([
            "data" => $tasks->where('id_proyecto',$id_proyecto)->orderBy('sortorder')->get(),
            "links" => $links->all()
            //"empleado" => $empleados->all(),
        ]);
    }
}