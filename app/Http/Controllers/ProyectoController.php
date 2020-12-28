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
use App\Recursos;
use App\TipoDeRecursos;
use App\RolUsuario;
use App\ComiteDeEvaluacion;
use App\ComiteUsuario;
use App\Factibilidad;
use App\User;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function misProyectos(){
        $user = auth()->user()->id;
        //return DB::table('permissions')->paginate(3);
        $proyectos = DB::table('proyecto')
                ->join('equipo_de_investigacion', 'proyecto.id_equipo','equipo_de_investigacion.id')
                ->join('usuario_equipo_rol', 'equipo_de_investigacion.id','usuario_equipo_rol.id_equipo')                
                ->select('proyecto.nombre','usuario_equipo_rol.id_rol', 'proyecto.id')                
                ->where([
                    ['id_usuario',$user],
                    ['id_rol','=',5],
                    ['id_estado','=',1]
                ])
                ->paginate(3);           
                
        return view ('proyectoViews.mis_proyectos.index', [
            'proyectos' => $proyectos
        ]);  
    }

    //Lista de proyectos donde el usuario ha colaborado
    public function indexColaboracion()
    {
        $idUsuarioLogeado=auth()->user()->id;
        //return DB::table('permissions')->paginate(3);
        $colaboraciones=DB::table('proyecto')
                ->join('equipo_de_investigacion', 'proyecto.id_equipo','equipo_de_investigacion.id')
                ->join('usuario_equipo_rol', 'equipo_de_investigacion.id','usuario_equipo_rol.id_equipo')                
                ->select('proyecto.nombre','usuario_equipo_rol.id_rol', 'proyecto.id')                
                ->where([
                    ['id_usuario',$idUsuarioLogeado],
                    ['id_rol','!=',5],
                    ['id_estado','=',1]
                ])
                ->paginate(3);           
                
        return view ('proyectoViews.Colaboraciones.index', ['colaboraciones'=>$colaboraciones]);                
    }

    public function resumen($id){
        $proyecto = Proyecto::findOrFail($id);
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
        $id_comite = $proyecto->id_comite;
        $estados_soli = DB::select("SELECT * FROM estado_de_solicitud WHERE id = ? OR id = ? OR id = ?", [4,5,8]);
        $miembros_comite = DB::select("SELECT CU.id_usuario, U.name FROM comite_usuario CU JOIN users U ON CU.id_usuario = U.id WHERE id_comite = ?", [$id_comite]);
        $evaluaciones = DB::select("SELECT * FROM evaluacion E JOIN estado_de_solicitud EDS on EDS.id = E.respuesta WHERE E.id_solicitud = ? order by E.etapa, E.id_user", [$id]);
        $factibilidad = Factibilidad::where('id_proy', $id)->first();
        $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [$equipo->id]);
        $roles = DB::select('SELECT * FROM roles');        
        $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$equipo->id])->get();

        return view('proyectoViews.mis_proyectos.resumen', [
            'objetivos'=> $objetivos, 'alcances'=> $alcances, 'indicadores'=> $indicadores,
            'proyecto' => $proyecto, 'equipo' => $equipo, 't' => $tipo, 'st' => $subtipo,
            'tiposrec'=>$tiposrec, 'recursos'=>$recursos, 'recursosProy'=>$recursosProy,
            'solicitud'=>$solicitud, 'evaluaciones'=>$evaluaciones, 'estados'=>$estados_soli,
            'miembros_comite'=>$miembros_comite, 'factibilidad' => $factibilidad, 'miembros' => $miembros,
            'roles'=>$roles, 'miembrosEquipo'=>$miembrosEquipo,
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
    public function store(Request $request)
    {
        //
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
