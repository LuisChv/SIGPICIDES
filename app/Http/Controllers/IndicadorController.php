<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Proyecto;
use App\Variable;
use App\Documento;
use DB;

class IndicadorController extends Controller
{
    public function store(){
        $proyecto=DB::table('proyecto')
            ->where('id', request('id_proy'))->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        request()->validate([
            'id_proy'=> 'required',
            'descripcion_indicador'=> ['required', 'max:1000'],
        ],
        [
            'id_proy.required' => "Error, no hay un proyecto seleccionado",
            'descripcion_indicador.required' => "Describa el objetivo.",
        ]);

        $indicador = new Indicador();
        $indicador->id_proy = request('id_proy');
        $indicador->detalle = request('descripcion_indicador');
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function update(){
        request()->validate([
            'descripcion_indicador'=> ['required', 'max:1000'],
        ],
        [
            'descripcion_indicador.required' => "Describa el objetivo.",
        ]);

        $indicador = Indicador::findOrFail(request('id_indicador'));
        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }
        $indicador->detalle = request('descripcion_indicador');
        $indicador->save();

        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function destroy(){
        $indicador = Indicador::findOrFail(request('indicador'));

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicador->delete();
        return redirect()->route('proyecto.oai', [$indicador->id_proy]);
    }

    public function index($id){
        $proyecto= Proyecto::where('id', $id)->first();

        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);
        $variables = DB::select(
            "SELECT V.id, V.id_indicador, V.modificable, V.nombre, V.color, VE.valor_y FROM variable V
            LEFT JOIN valor_eje VE ON V.id = VE.id_variable
            WHERE id_indicador IN (SELECT id FROM indicador WHERE id_proy = ?)
            ORDER BY V.id", [$id]);

        return view('proyectoViews.indicador.index', [
           'indicadores' => $indicadores,
           'variables' => $variables,
           'proyecto'=> $proyecto
        ]);
    }

    public function cambiar_tipo($id){
        $indicador = Indicador::findOrFail($id);

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicador->tipo = !$indicador->tipo;
        $indicador->save();
        return redirect()->back();
    }

    public function cambiar_tipo_grafico($id){
        $indicador = Indicador::findOrFail($id);

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicador->tipo_de_grafico = !$indicador->tipo_de_grafico;
        $indicador->save();
        return redirect()->back();
    }

    public function variable(){
        $indicador = Indicador::findOrFail(request('id_indicador'));

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $variable = new Variable();
        $variable->id_indicador = request('id_indicador');
        $variable->color = request('color');
        $variable->nombre = request('nombre');
        $variable->save();
        return redirect()->back();
    }

    public function destroy_variable(){
        $variable = Variable::findOrFail(request('variable'));

        $indicador = Indicador::findOrFail($variable->id_indicador);

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $variable->delete();
        return redirect()->back();
    }

    public function confirmar($id){
        $indicador = Indicador::findOrFail($id);

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicador->modificable = false;
        $indicador->save();
        return redirect()->back();
    }

    public function general($id)
    {
        $indicador = Indicador::findOrFail($id);
        //Verificiación de seguridad
        //Solo miembros del equipo y del comite pueden ver esta pantalla
        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite && $proyecto->id_estado!=null){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $variables = DB::select(
            "SELECT * FROM variable
            WHERE id_indicador = ?
            ORDER BY id", [$id]);
        //Traer comentarios del indicador
        $comentarios= DB::table('comentario_indicador')
            ->join('users', 'comentario_indicador.id_user', 'users.id')
            ->where('id_indicador', $indicador->id)
            ->select('comentario_indicador.*', 'users.name')            
            ->orderBy('comentario_indicador.created_at')
            ->get();

        
        $files = Documento::where('id_indicador',$indicador->id)->get(); 
        
        //dd($comentarios);
        return view('proyectoViews.indicador.show.general', [
            'indicador' => $indicador,
            'variables' => $variables,
            'comentarios'=> $comentarios,
            'miembro'=>$miembro,
            'files'=>$files,
        ]);
    }

    public function task($id)
    {
        $indicador = Indicador::findOrFail($id);
        if($indicador->modificable){
            abort(403);
        }
        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $tareas = DB::select(
            "SELECT T.id, T.text, T.progress FROM tasks T
            JOIN task_indicador TI ON TI.id_task = T.id
            WHERE TI.id_indicador = ?", [$id]);

        $usuarios = DB::select(
            "SELECT U.name, TU.id_task FROM users U
            JOIN tarea_usuario TU ON U.id = TU.id_usuario
            WHERE TU.id_task IN (
                SELECT T.id FROM tasks T
                JOIN task_indicador TI ON TI.id_task = T.id
                WHERE TI.id_indicador = ?
            )", [$id]);
        
        return view('proyectoViews.indicador.show.task',[
            'indicador' => $indicador,
            'tareas' => $tareas,
            'usuarios' => $usuarios
        ]);
    }

    public function estadistica($id){
        $indicador = Indicador::findOrFail($id);

        if($indicador->modificable){
            abort(403);
        }

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $variables = DB::select(
            "SELECT * FROM variable
            WHERE id_indicador = ?
            ORDER BY id", [$id]);

        $valores = DB::select(
            "SELECT VE.id, id_variable, VE.valor_x, VE.valor_y FROM variable V
            LEFT JOIN valor_eje VE ON V.id = VE.id_variable
            WHERE id_indicador = ?
            ORDER BY VE.id", [$id]);
                
        return view('proyectoViews.indicador.show.estadistica', [
            'indicador' => $indicador,
            'variables' => $variables,
            'valores'   => $valores,
            'lider' => $lider
        ]); 
    }

    public function descripcion(){
        $indicador = Indicador::findOrFail(request('id_indicador'));

        $proyecto=DB::table('proyecto')
            ->where('id', $indicador->id_proy)->first();
        if($proyecto){
            $miembro=DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_equipo',$proyecto->id_equipo]])->first();
            $lider= DB::table('usuario_equipo_rol')
            ->where([['id_usuario',auth()->user()->id],['id_rol','=',5],['id_equipo',$proyecto->id_equipo]])->first();
            $comite=DB::table('comite_usuario')
            ->where([['id_usuario',auth()->user()->id],['id_comite',$proyecto->id_comite]])->first();
            if(!$miembro && !$comite){
                abort(403);
                
            }
            $miembro=false;
            if(!$lider && !$comite){
                $miembro= true;
            }
        }else{
            abort(404);
        }

        $indicador->descrip_avance = request('descripcion');
        $indicador->save();
        return redirect()->back();
    }
}
