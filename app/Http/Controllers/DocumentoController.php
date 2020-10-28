<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Documento;

class DocumentoController extends Controller
{
    public function archivos(){
        $files = Documento::all();
        return view('proyectoViews.indicador.archivos', [
            'files'=>$files,
        ]);
    }

    public function archivos_store(Request $request){
        
        $id_proyecto = 1;
        $max_size = (int)ini_get('upload_max_filesize')*10240;
        $files = $request->file('files');

        foreach($files as $file){
            if(Storage::putFileAs('/public/'.$id_proyecto.'/',$file,$file->getClientOriginalName())){
                Documento::create([
                    'nombre' => $file->getClientOriginalName(),
                    'doc' =>  'Es una prueba de documento plano',
                    'id_tipo_doc' => 1,
                    'id_indicador' => 1,
                ]);
            }
            
        }

        $files = Documento::all();
        return redirect()->route('archivos.index');
    }

    public function archivos_download($id){
        $id_proyecto = 1;
        $file = Documento::find($id);
        $path = public_path('storage/'.$id_proyecto.'/'.$file->nombre);
        return response()->download($path);
    }

    public function archivos2(){
        return view('proyectoViews.avance.index');
    }
}
