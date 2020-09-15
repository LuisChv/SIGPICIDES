<?php
namespace App\Http\Controllers;
use App\Task;
use App\Link;
//use App\Empleado;
 
class GanttController extends Controller
{
    public function get(){
        $tasks = new Task();
        $links = new Link();
        //$empleados = new Empleado(); 
        return response()->json([
            "data" => $tasks->orderBy('sortorder')->get(),
            "links" => $links->all()
            //"empleado" => $empleados->all(),
        ]);
    }
}