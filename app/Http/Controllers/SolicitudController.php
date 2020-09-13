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
            'costo'=> 'required',
            'tema'=> 'required',
            'justificacion'=> 'required',
            'resultados'=> 'required',
            'miembros'=> 'required',
            'duracion'=> 'required',
        ],
        [
            'nombre.required' => "El nombre es obligatorio.",
            'tipoRec.required'=>"Elija el tipo de investigación",
            'subtipo.required' => "Elija el sutipo de investigación.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'costo.required' => "El costo es obligatorio.",
            'tema.required'=>"El tema es obligatorio",
            'justificacion.required' => "Justifique su proyecto",
            'resultados.required' => "Defina los resultados esperados.",
            'miembros.required' => "Ingrese la cantidad de miembros para el equipo de investigación.",
            'duracion.required' => "Estime la duración del proyecto en días.",
        ]);
        //Equipo_investigacion
        $equipo= new EquipoDeInvestigacion;
        $equipo->miembros = request('miembros');
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
        $proyecto->costo = request('costo');
        $proyecto->tema = request('tema');
        $proyecto->justificacion = request('justificacion');
        $proyecto->resultados = request('resultados');
        $proyecto->duracion = request('duracion');
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
        return view('proyectoViews.objetivo_alcance.create');
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

    public function factibilidad(){
        return view('proyectoViews.factibilidad.create');
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
