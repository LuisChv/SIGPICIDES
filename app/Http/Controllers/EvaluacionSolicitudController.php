<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
use App\User;

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
        
        $indicadores= Indicador::where('id_proy',$id)->get();
        $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$equipo->id])->get();

        $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [6,7,8]);


        return view('evaluacion.evaluacionMiembro2', [
            'factibilidad' => $factibilidad,
            'miembros' => $miembros,
            'roles'=>$roles,
            'idProyecto'=>$id, 
            'indicadores'=>$indicadores, 
            'miembrosEquipo'=>$miembrosEquipo,
            'solicitud'=>$solicitud,
            'estados'=>$estados_soli,
            
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
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();

        request()->validate([
            'comentario'=> ['max:2048'],
            'resultado' => 'required'
        ],
        [
            'resultado.required' => "Seleccione una respuesta.",
            'comentario.max' => "El comentario no debe exceder los 2048 caracteres."
        ]);

        $respuesta = request('resultado');
      
        if($solicitud->id_estado == 9){
            $evaluacion = Evaluacion::where('id_solicitud', $solicitud->id)->where('id_user', Auth::user()->id)->where('etapa', 1)->first();;
            $evaluacion->etapa = $solicitud->etapa;
            $evaluacion->id_user = Auth::user()->id;
            $evaluacion->id_solicitud = $id;
            $evaluacion->comentario = request('comentario');
            $evaluacion->respuesta = $respuesta;
            $evaluacion->visible = true;
            $evaluacion->save();
        }
        else{
            $evaluacion = new Evaluacion;
            $evaluacion->etapa = $solicitud->etapa;
            $evaluacion->id_user = Auth::user()->id;
            $evaluacion->id_solicitud = $id;
            $evaluacion->comentario = request('comentario');
            $evaluacion->respuesta = $respuesta;
            $evaluacion->visible = false;
            $evaluacion->save();
        }

        return redirect()->route('solicitud.mis_solicitudes_comite');
        
        
    }

    public function store2($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();

        request()->validate([
            'comentario'=> ['max:2048'],
            'resultado' => 'required'
        ],
        [
            'resultado.required' => "Seleccione una respuesta.",
            'comentario.max' => "El comentario no debe exceder los 2048 caracteres."
        ]);

        $respuesta = request('resultado');
      
        if($solicitud->id_estado == 9){
            $evaluacion = Evaluacion::where('id_solicitud', $solicitud->id)->where('id_user', Auth::user()->id)->where('etapa', 2)->first();;
            $evaluacion->etapa = $solicitud->etapa;
            $evaluacion->id_user = Auth::user()->id;
            $evaluacion->id_solicitud = $id;
            $evaluacion->comentario = request('comentario');
            $evaluacion->respuesta = $respuesta;
            $evaluacion->visible = true;
            $evaluacion->save();
        }
        else{
            $evaluacion = new Evaluacion;
            $evaluacion->etapa = $solicitud->etapa;
            $evaluacion->id_user = Auth::user()->id;
            $evaluacion->id_solicitud = $id;
            $evaluacion->comentario = request('comentario');
            $evaluacion->respuesta = $respuesta;
            $evaluacion->visible = false;
            $evaluacion->save();
        }

        return redirect()->route('solicitud.mis_solicitudes_comite');
        
        
    }

    public function evaluacion_final2($id)
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

    public function evaluacion_final($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $solicitud->enviada = false;
        $solicitud->noti_inv = false;
        $solicitud->save();
        $id_comite = $proyecto->id_comite;

        $miembros_comite = DB::select("SELECT CU.id_usuario, U.name FROM comite_usuario CU JOIN users U ON CU.id_usuario = U.id WHERE id_comite = ?", [$id_comite]);

        if($solicitud->etapa == 1){
            $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [4,5,8]);
            $evaluaciones = DB::select("SELECT * FROM evaluacion WHERE id_solicitud = ? AND etapa = ?", [$id, 1]);
        }else{
            $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [6,7,8]);
            $evaluaciones = DB::select("SELECT * FROM evaluacion WHERE id_solicitud = ? AND etapa = ?", [$id, 2]);
        }
       

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
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::findOrFail($id);
        //$etapa;
        $user = User::whereRaw('id = (select id_usuario from usuario_equipo_rol where id_equipo=? and id_rol=5)',[$proyecto->id_equipo])->first();        
        
        $data = array('email'=> $user->email, 'name'=>$user->name, 'nombreProyecto'=>$proyecto->nombre, 'etapa'=>$solicitud->etapa);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.evaluacionFase1', $data, function ($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Evaluación de solicitud Fase 1 completada');
            if($data['etapa']==1){
                $message->subject('Evaluación de solicitud Fase 1 completada');
            }
            elseif($data['etapa']==2){
                $message->subject('Evaluación de solicitud Fase 2 completada');
            }
        });

        $evaluaciones = DB::select("SELECT * FROM evaluacion WHERE id_solicitud = ? AND etapa = ?", [$id,1]);

        foreach($evaluaciones as $eva){
            $evaluacion = Evaluacion::findOrFail($eva->id);
            $evaluacion->visible = false;
            $evaluacion->save();
        }

        $solicitud->id_estado = $respuesta;

        if($respuesta == 5){
            $solicitud->etapa = 2;
        }

        if($respuesta == 7){
            $proyecto->id_estado = 1;
            $proyecto->save();
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
