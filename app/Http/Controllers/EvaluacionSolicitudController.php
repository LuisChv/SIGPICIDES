<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubTipoDeInvestigacion;
use App\TipoDeInvestigacion;
use App\Proyecto;
use App\Solicitud;
use App\EquipoDeInvestigacion; 
use App\UsuarioEquipoRol;
use DB;
use Auth;
use App\Objetivo;
use App\Alcance;
use App\Indicador;
use App\Factibilidad;
use App\Recursos;
use App\TipoDeRecursos;
use App\RolUsuario;
use App\ComiteDeEvaluacion;
use App\ComiteUsuario;
use App\Evaluacion;
use App\EstadoDeSoliProy;

class EvaluacionSolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $id_comite = $proyecto->id_comite;

        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $subtipo = SubTipoDeInvestigacion::findOrFail($proyecto->id_subtipo);
        $tipo = TipoDeInvestigacion::findOrFail($subtipo->id_tipo);
        $objetivos = DB::select("SELECT * FROM objetivo WHERE id_proyecto = ?", [$id]);
        $alcances = DB::select("SELECT * FROM alcance WHERE id_proyecto = ?", [$id]);
        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);
        $recursos=Recursos::all();
        $tiposrec=TipoDeRecursos::all();
        $recursosProy=DB::select("SELECT RP.id, RP.cantidad, R.nombre, R.id_tipo, RP.detalle FROM recursos_por_proy RP JOIN recurso R ON R.id = RP.id_recurso WHERE RP.id_proy = ?", [$id]);

        $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [4,5,8]);

        return view('evaluacion.evaluacionMiembro', [
            'objetivos'=> $objetivos,
            'alcances'=> $alcances,
            'indicadores'=> $indicadores,
            'proyecto' => $proyecto,
            'equipo' => $equipo,
            't' => $tipo,
            'st' => $subtipo,
            'tiposrec'=>$tiposrec,
            'recursos'=>$recursos,
            'recursosProy'=>$recursosProy,
            'solicitud'=>$solicitud,
            'estados'=>$estados_soli,
        ]);
    }

    public function index2($id){
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $factibilidad = Factibilidad::where('id_proy', $id)->first();
        $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [$equipo->id]);
        $roles = DB::select('SELECT * FROM roles WHERE tipo_rol = ?', [true]);
        $idUsuarioLogeado=auth()->user()->id;
        $usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $equipo->id_equipo)->where('id_usuario', $idUsuarioLogeado)->firstOr(function(){
            abort(403);
        });
        $indicadores= Indicador::where('id_proy',$id)->get();
        $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$idEquipo->id_equipo])->get();

        return view('evaluacion.evaluacionMiembro2', [
            'factibilidad' => $factibilidad,
            'miembros' => $miembros,
            'roles'=>$roles,
            'idProyecto'=>$id, 
            'indicadores'=>$indicadores, 
            'miembrosEquipo'=>$miembrosEquipo,
            'solicitud'=>$solicitud,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $respuesta = request('resultado');
      
        $evaluacion = new Evaluacion;
        $evaluacion->etapa = 1;
        $evaluacion->id_user = Auth::user()->id;
        $evaluacion->id_solicitud = $id;
        $evaluacion->comentario = request('comentario');
        $evaluacion->respuesta = $respuesta;
        $evaluacion->visible = false;
        $evaluacion->save();

        return redirect()->route('solicitud.mis_solicitudes_comite');
        
        
    }

    public function evaluacion_final($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $solicitud->enviada = false;
        $solicitud->noti_inv = false;
        $solicitud->save();
        $id_comite = $proyecto->id_comite;
        $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [4,5,8]);

        $miembros_comite = DB::select("SELECT CU.id_usuario, U.name FROM comite_usuario CU JOIN users U ON CU.id_usuario = U.id WHERE id_comite = ?", [$id_comite]);

        $evaluaciones = DB::select("SELECT * FROM evaluacion WHERE id_solicitud = ? ", [$id]);

        return view('evaluacion.evaluacionFinal', [
            'proyecto' => $proyecto,
            'solicitud'=>$solicitud,
            'evaluaciones'=>$evaluaciones,
            'estados'=>$estados_soli,
            'miembros_comite'=>$miembros_comite,
        ]);

    }

    public function respuesta_evaluacion($id)
    {
        $respuesta = request('resultado');
        
        $solicitud = Solicitud::findOrFail($id);

        $solicitud->id_estado = $respuesta;

        if($respuesta == 5){
            $solicitud->etapa = 2;
        }

        $solicitud->save();

        return redirect()->route('solicitud.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
