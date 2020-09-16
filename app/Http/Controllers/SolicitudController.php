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

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index()
    {
        //$solicitudes= \App\Solicitud::all();
        $solicitudes = DB::select(
            "SELECT * 
            FROM solicitud s 
            JOIN proyecto p 
            ON s.id = p.id");
        /*
        $solicitudes = DB::select(
            "SELECT * 
            FROM solicitud s 
            JOIN estado_de_solicitud es
            ON s.idS = es.idS
            WHERE estadoES=1"); //asumiendo que el estado 1 seria el de pendientes de aprobar */
        return view('proyectoViews.solicitud.Admin.index', ['solicitudes'=>$solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_tipos= SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();
        return view('proyectoViews.solicitud.Investigador.crear', [
            'tiposinv' => $tiposinv,
            'sub_tipos' => $sub_tipos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        //dd(auth()->user()->id);
        //Validacion de los datos      
        request()->validate([
            'nombre'=> 'required',
            'tipoRec'=> 'required',
            'subtipo'=> 'required',
            'descripcion'=> 'required',     
            'tema'=> 'required',
            'justificacion'=> 'required',
            'resultados'=> 'required',
        ],
        [
            'nombre.required' => "El nombre es obligatorio.",
            'tipoRec.required'=>"Elija el tipo de investigación",
            'subtipo.required' => "Elija el sutipo de investigación.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'tema.required'=>"El tema es obligatorio",
            'justificacion.required' => "Justifique su proyecto",
            'resultados.required' => "Defina los resultados esperados.",
        ]);
        //Equipo_investigacion
        $equipo= new EquipoDeInvestigacion;
        $equipo->save();

        //Usuario_equipo_rol con el investigador como lider 
        $lider= new UsuarioEquipoRol;       
        $lider->id_equipo= $equipo->id;
        $lider->id_usuario=auth()->user()->id;
        $lider->id_rol=5;
        $lider->save();

        //Se asignan las variables al nuevo proyecto
        $proyecto= new Proyecto();
        $proyecto->id_subtipo = request('subtipo');
        $proyecto->id_equipo = $equipo->id;
        $proyecto->nombre = request('nombre');
        $proyecto->descripcion = request('descripcion');
        $proyecto->tema = request('tema');
        $proyecto->justificacion = request('justificacion');
        $proyecto->resultados = request('resultados');
        //Se crea el nuevo proyecto
        $proyecto->save();

        //Se crea la solicitud del proyecto
        $solicitud=new Solicitud();
        $solicitud->id_proy=$proyecto->id;
        $solicitud->noti_inv= false;
        $solicitud->noti_coo= false;
        $solicitud->id_estado = 1;
        //$solicitud->modificable=false;
        //Se crea el nuevo detalle recurso
        $solicitud->save();
        //TODO redireccionamiento provisional
        

        return redirect()->route('proyecto.oai', $proyecto->id);
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
        $proyecto = Proyecto::findOrFail($id);
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $subtipo = SubTipoDeInvestigacion::findOrFail($proyecto->id_subtipo);
        $tipo = TipoDeInvestigacion::findOrFail($subtipo->id_tipo);
        $sub_tipos= SubTipoDeInvestigacion::all();
        $tiposinv=TipoDeInvestigacion::all();
        return view('proyectoViews.solicitud.Investigador.editar', [
            'tiposinv' => $tiposinv,
            'sub_tipos' => $sub_tipos,
            'proyecto' => $proyecto,
            'equipo' => $equipo,
            't' => $tipo,
        ]);
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
        return redirect()->route('proyecto.oai', $id);
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

    public function mis_solicitudes(){
        $solicitudes = DB::select(
            "SELECT S.id, P.nombre, S.id_proy FROM usuario_equipo_rol UER 
            JOIN equipo_de_investigacion EDI ON uer.id_equipo = EDI.id
            JOIN proyecto P ON EDI.id = P.id_equipo
            JOIN solicitud S ON S.id_proy = P.id
            WHERE uer.id_usuario = ?", [Auth::user()->id]);
        
        return view('proyectoViews.solicitud.Investigador.misSolicitudes', [
            'solicitudes'=>$solicitudes,
        ]);
    }

    public function oai($id){
        $proyecto = Proyecto::findOrFail($id);
        $objetivos = DB::select("SELECT * FROM objetivo WHERE id_proyecto = ?", [$id]);
        $alcances = DB::select("SELECT * FROM alcance WHERE id_proyecto = ?", [$id]);
        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);

        return view('proyectoViews.solicitud.Investigador.oai', [
            'objetivos'=> $objetivos,
            'alcances'=> $alcances,
            'indicadores'=> $indicadores,
            'id'=> $id,
        ]);
    }

    public function pre($id){
        $proyecto = Proyecto::findOrFail($id);
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $subtipo = SubTipoDeInvestigacion::findOrFail($proyecto->id_subtipo);
        $tipo = TipoDeInvestigacion::findOrFail($subtipo->id_tipo);
        $objetivos = DB::select("SELECT * FROM objetivo WHERE id_proyecto = ?", [$id]);
        $alcances = DB::select("SELECT * FROM alcance WHERE id_proyecto = ?", [$id]);
        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);
        $recursos=Recursos::all();
        $tiposrec=TipoDeRecursos::all();
        $recursosProy=DB::select("SELECT RP.id, RP.cantidad, R.nombre, R.id_tipo, RP.detalle FROM recursos_por_proy RP JOIN recurso R ON R.id = RP.id_recurso WHERE RP.id_proy = ?", [$id]);

        return view('proyectoViews.solicitud.Investigador.previsualizacion', [
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
        ]);
    }

    public function enviar($id){
        $director = RolUsuario::where('role_id', 3)->first();
        $coordinador = RolUsuario::where('role_id', 2)->first();
        $proyecto = Proyecto::findOrFail($id);

        $solicitud = Solicitud::where('id_proy', $id)->first();
        $solicitud->enviada = true;
        $solicitud->id_estado = 3;
        $solicitud->noti_inv = true;
        $solicitud->modificable = false;
        $solicitud->save();

        $comite = new ComiteDeEvaluacion();
        $comite->save();

        $proyecto->id_comite = $comite->id;
        $proyecto->save();

        $comite_usuario = new ComiteUsuario();
        $comite_usuario->id_comite = $comite->id;
        $comite_usuario->id_usuario = $director->user_id;
        $comite_usuario->save();

        $comite_usuario = new ComiteUsuario();
        $comite_usuario->id_comite = $comite->id;
        $comite_usuario->id_usuario = $coordinador->user_id;
        $comite_usuario->save();

        return redirect()->route('solicitud.mis_solicitudes');
    }

    public function factibilidad($id){
        $proyecto = Proyecto::where('id', $id)->first();
        return view('proyectoViews.factibilidad.create', [
            'proyecto' => $proyecto,
        ]);
    }

    public function planificacion(){
        return view('proyectoViews.planificacion.index');
    }
    public function indicador(){
        return view('proyectoViews.planificacion.indicadores_index');
    }
    public function show2()
    {
        //
        return view('proyectoViews.solicitud.Investigador.show');
    }
}
