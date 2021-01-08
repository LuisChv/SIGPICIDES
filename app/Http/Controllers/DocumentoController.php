<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Documento;
use App\Indicador;
use App\Task;
use DB;

class DocumentoController extends Controller
{

    public function archivos_tareas_store(Request $request){
        $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('files');
        $id_tarea = request('archivosTarea');
        $avance = request('descripcionAvance');
        $task = Task::find($id_tarea);
        if($avance != null){
            $tarea = DB::table('tasks')->where('id',$id_tarea)->update(['avance' => $avance]);
        }
       
        $archivos_guardados= array();
        if($files != null){
            foreach($files as $file){
                if(Storage::putFileAs('/public/'.$task->id_proyecto.'/tareas/',$file,$file->getClientOriginalName())){
                    $doc = new Documento;
                    $doc->nombre = $file->getClientOriginalName();
                    $doc->id_tipo_doc = 1;
                    $doc->id_task = $id_tarea;
                    $doc->save();
                    array_push($archivos_guardados, $doc);
                }else{
                    array_push($archivos_guardados, $file->getClientOriginalName());
                }            
            }   
        }
        return response()->json([
            "docs"=> $archivos_guardados,            
        ]);
        //$files = Documento::all();
        //return redirect()->route('tareas_avance.index', $id_proyecto);
    }

    public function archivos_indicador_store(Request $request, $id){
        $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('files');
        $avance = request('descripcionAvance');
        $indicador = Indicador::find($id);

        if($avance != null){
            $indicador->descrip_avance = $avance;
            $indicador->save();
        }
        if($files != null){
            foreach($files as $file){
                if(Storage::putFileAs('/public/'.$indicador->id_proy.'/indicadores/',$file,$file->getClientOriginalName())){
                    $doc = new Documento;
                    $doc->nombre = $file->getClientOriginalName();
                    $doc->id_tipo_doc = 1;
                    $doc->id_indicador = $indicador->id;
                    $doc->save();
                }
                
            }
        }

        $files = Documento::all();
        return redirect()->route('indicador.general', $indicador->id);
    }

    public function traerArchivos($id_task){
        $documentos = Documento::where('id_task', $id_task)->get();
        $tarea = Task::find($id_task);
        return response()->json([
            "documentos" => $documentos,
            "descripcion" => $tarea->avance,
        ]);
    }  

    public function archivos_download($id_indicador, $id){
        $indicador = Indicador::find($id_indicador);
        $id_proyecto = $indicador->id_proy;
        $file = Documento::find($id);
        $path = public_path('storage/'.$id_proyecto.'/indicadores/'.$file->nombre);
        return response()->download($path);
    }

    public function archivos_download_tarea($id_task, $id){
        $tarea = Task::find($id_task);
        $id_proyecto = $tarea->id_proyecto;
        $file = Documento::find($id);        
        $path = public_path('storage/'.$id_proyecto.'/tareas/'.$file->nombre);
        return response()->download($path);
    }
    

    public function destroy_indicador($id_doc)
    {
        $file = Documento::find($id_doc); 
        DB::table('documento')->where('id', $id_doc)->delete();
        return redirect()->route('indicador.estadistica',[$file->id_indicador]);
    }

    public function destroy_tarea($id_doc)
    {
        $file = Documento::find($id_doc); 
        $tarea = Task::find($file->id_task);
        DB::table('documento')->where('id', $id_doc)->delete();
        $documentos = Documento::where('id_task', $tarea->id)->get();
        return redirect()->route('tareas_avance.index',[$tarea->id_proyecto]);
    }
}
