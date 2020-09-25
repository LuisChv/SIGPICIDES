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
            ON s.id = p.id WHERE s.id_estado = ?", [3]);
       
       $solicitudes_E= DB::select("SELECT s.id_estado, s.etapa, E.estado, p.nombre 
        FROM solicitud s 
        JOIN proyecto p ON s.id = p.id 
        JOIN estado_de_solicitud E ON s.id_estado = E.id"
        );
        

        return view('proyectoViews.solicitud.Admin.index', [
            'solicitudes'=>$solicitudes,
            'solicitudes_E'=>$solicitudes_E,
           
            ]);
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
            'nombre'=> ['required', 'max:1024', 'string'],
            'tipoRec'=> 'required',
            'subtipo'=> 'required',
            'descripcion'=> ['required', 'max:1024', 'string'], 
            'tema'=> ['required', 'max:1024', 'string'],
            'justificacion'=> ['required', 'max:1024', 'string'],
            'resultados'=> ['required', 'max:1024', 'string'],
            'duracion'=> ['required', 'numeric', 'max:300', 'min:1'],
            'miembros'=> ['required','numeric', 'max:20', 'min:0'],
            'costo'=> ['required','numeric', 'min:0']
        ],
        [
            'nombre.required' => "El nombre es obligatorio.",
            'tipoRec.required'=>"Elija el tipo de investigación",
            'subtipo.required' => "Elija el sutipo de investigación.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'descripcion.max' => "El texto no debe exceder los 1024 caracteres.",
            'tema.required'=>"El tema es obligatorio",
            'justificacion.required' => "Justifique su proyecto",
            'justificacion.max' => "El texto no debe exceder los 1024 caracteres.",
            'resultados.required' => "Defina los resultados esperados.",
            'resultados.max' => "El texto no debe exceder los 1024 caracteres.",
            'duracion.required' => "Estime la duración del proyecto.",
            'duracion.numeric' => "Debe ingresar el numero de semanas.",
            'miembros.required' => "Ingrese la cantidad de miembros.",
            'miembros.numeric' => "Debe ingresar el numero de miembros.",
            'costo.required' => "Estime el costo del proyecto.",
            'costo.numeric' => "USD ($)",
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
        $proyecto->tema = request('tema');
        $proyecto->justificacion = request('justificacion');
        $proyecto->resultados = request('resultados');
        $proyecto->duracion = request('duracion');
        $proyecto->costo = request('costo');
        //Se crea el nuevo proyecto
        $proyecto->save();

        //Se crea la solicitud del proyecto
        $solicitud=new Solicitud();
        $solicitud->id_proy=$proyecto->id;
        $solicitud->id_estado = 1;
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
    //TODO validar
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
    //TODO validar
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre'=> ['required', 'max:1024', 'string'],
            'tipoRec'=> 'required',
            'subtipo'=> 'required',
            'descripcion'=> ['required', 'max:1024', 'string'], 
            'tema'=> ['required', 'max:1024', 'string'],
            'justificacion'=> ['required', 'max:1024', 'string'],
            'resultados'=> ['required', 'max:1024', 'string'],
            'duracion'=> ['required', 'numeric', 'max:300', 'min:1'],
            'miembros'=> ['required','numeric', 'max:20', 'min:0'],
            'costo'=> ['required','numeric', 'min:0']
        ],
        [
            'nombre.required' => "El nombre es obligatorio.",
            'tipoRec.required'=>"Elija el tipo de investigación",
            'subtipo.required' => "Elija el sutipo de investigación.",
            'descripcion.required' => "La descripcion es obligatoria.",
            'descripcion.max' => "El texto no debe exceder los 1024 caracteres.",
            'tema.required'=>"El tema es obligatorio",
            'justificacion.required' => "Justifique su proyecto",
            'justificacion.max' => "El texto no debe exceder los 1024 caracteres.",
            'resultados.required' => "Defina los resultados esperados.",
            'resultados.max' => "El texto no debe exceder los 1024 caracteres.",
            'duracion.required' => "Estime la duración del proyecto.",
            'duracion.numeric' => "Debe ingresar el numero de semanas.",
            'miembros.required' => "Ingrese la cantidad de miembros.",
            'miembros.numeric' => "Debe ingresar el numero de miembros.",
            'costo.required' => "Estime el costo del proyecto.",
            'costo.numeric' => "USD ($)",
        ]);

        //Se asignan las variables al nuevo proyecto
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->id_subtipo = request('subtipo');
        $proyecto->nombre = request('nombre');
        $proyecto->descripcion = request('descripcion');
        $proyecto->tema = request('tema');
        $proyecto->justificacion = request('justificacion');
        $proyecto->resultados = request('resultados');
        $proyecto->duracion = request('duracion');
        $proyecto->costo = request('costo');
        //Se crea el nuevo proyecto
        $proyecto->save();

        //Equipo_investigacion
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $equipo->miembros = request('miembros');
        $equipo->save();

        //Se crea la solicitud del proyecto
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $solicitud->id_proy=$proyecto->id;
        
        if($solicitud->id_estado == 4){

        }else{
            $solicitud->id_estado = 1;
        }
        $solicitud->noti_inv= false;
        $solicitud->noti_coo= false;
        //$solicitud->modificable=false;
        //Se crea el nuevo detalle recurso
        $solicitud->save();
        //TODO redireccionamiento provisional
        

        return redirect()->route('proyecto.oai', $proyecto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $id)->first();
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $miembros = UsuarioEquipoRol::where('id_equipo', $equipo->id);
        
        $solicitud->delete();
        $proyecto->delete();
        foreach($miembros as $miembro){
            $miembro->delete();
        }
        $equipo->delete();
        return redirect()->route('solicitud.mis_solicitudes');
    }

    public function mis_solicitudes(){
        $solicitudes = DB::select(
            "SELECT S.id, P.nombre, S.id_proy, S.id_estado, S.enviada, EDS.estado, S.etapa FROM usuario_equipo_rol UER 
            JOIN equipo_de_investigacion EDI ON uer.id_equipo = EDI.id
            JOIN proyecto P ON EDI.id = P.id_equipo
            JOIN solicitud S ON S.id_proy = P.id
            JOIN estado_de_solicitud EDS ON EDS.id = S.id_estado
            WHERE uer.id_usuario = ?
            ORDER BY EDS.estado", [Auth::user()->id]);
        
        return view('proyectoViews.solicitud.Investigador.misSolicitudes', [
            'solicitudes'=>$solicitudes,
        ]);
    }

    public function mis_solicitudes_comite(){
        $solicitudes_etapa1 = DB::select(
            "SELECT ROW_NUMBER() OVER(ORDER BY S.id ASC) AS row, P.nombre, S.id_proy, S.etapa, S.id as id_soli FROM comite_usuario CU 
            JOIN comite_de_evaluacion C ON CU.id_comite = C.id
            JOIN proyecto P ON C.id = P.id_comite
            JOIN solicitud S ON S.id_proy = P.id
            WHERE CU.id_usuario = ? AND S.id_estado = ?", [Auth::user()->id, 3]);
        
        $solicitudes_corregidas1 = DB::select(
            "SELECT P.nombre, S.id, S.etapa, S.id_proy FROM solicitud S
            LEFT JOIN evaluacion E ON S.id = E.id_solicitud
			JOIN proyecto P ON S.id_proy = P.id
            WHERE E.id_user = ? AND E.etapa = ? AND S.id_estado = ? AND E.visible = ? ", [Auth::user()->id,1,9,false]);

        $solicitudes_etapa2 = DB::select(
            "SELECT ROW_NUMBER() OVER(ORDER BY S.id ASC) AS row, P.nombre, S.id_proy, S.etapa, S.id as id_soli FROM comite_usuario CU 
            JOIN comite_de_evaluacion C ON CU.id_comite = C.id
            JOIN proyecto P ON C.id = P.id_comite
            JOIN solicitud S ON S.id_proy = P.id
            WHERE CU.id_usuario = ? AND S.id_estado = ?", [Auth::user()->id, 3]);

        $solicitudes_corregidas2 = DB::select(
        "SELECT P.nombre, S.id, S.etapa, S.id_proy FROM solicitud S
        LEFT JOIN evaluacion E ON S.id = E.id_solicitud
        JOIN proyecto P ON S.id_proy = P.id
        WHERE E.id_user = ? AND E.etapa = ? AND S.id_estado = ? AND E.visible = ? ", [Auth::user()->id,2,9,false]);

        
        $solicitudes_con_comite = DB::select(
                "SELECT S.id as id_solicitud, P.nombre, COUNT(C.id) FROM proyecto P 
                JOIN solicitud S ON P.id = S.id_proy
                JOIN comite_de_evaluacion C ON S.id_proy = C.id
                JOIN comite_usuario CU ON CU.id_comite = C.id
                GROUP BY S.id, P.nombre, C.id, CU.id_comite");
        
        $evaluadas1 = DB::select("SELECT id_solicitud FROM evaluacion 
        WHERE id_user = ? AND etapa = ?", [Auth::user()->id, 1]);

        $evaluadas2 = DB::select("SELECT id_solicitud FROM evaluacion 
        WHERE id_user = ? AND etapa = ?", [Auth::user()->id, 2]);

        //Filtro de solicitudes sin evaluar        
        foreach ($solicitudes_etapa1 as $soli) { 
            foreach($evaluadas1 as $eva){ 
                if($soli->id_soli == $eva->id_solicitud){
                   unset($solicitudes_etapa1[$soli->row- 1 ]);
                }
            }
        }

        //Filtro de solicitudes con comite asignado
        foreach ($solicitudes_etapa1 as $soli) { 
            foreach($solicitudes_con_comite as $scc){ 
                if($soli->id_soli == $scc->id_solicitud && $scc->count == 2){
                   unset($solicitudes_etapa1[$soli->row - 1 ]);
                }
            }
        }

        //Filtro de solicitudes sin evaluar etapa 2
        foreach ($solicitudes_etapa2 as $soli) { 
            foreach($evaluadas2 as $eva){ 
                if($soli->id_soli == $eva->id_solicitud){
                   unset($solicitudes_etapa2[$soli->row - 1 ]);
                }
            }
        }
        
        return view('proyectoViews.solicitud.Admin.misSolicitudesComite', [
            'solicitudes1'=>$solicitudes_etapa1,
            'solicitudes_corregidas1'=>$solicitudes_corregidas1,
            'evaluadas1'=>$evaluadas1,
            'solicitudes2'=>$solicitudes_etapa2,
            'solicitudes_corregidas2'=>$solicitudes_corregidas2,
            'evaluadas2'=>$evaluadas2,
        ]);
    }
    //TODO validar
    public function oai($id){
        $proyecto = Proyecto::findOrFail($id);
        $objetivos = DB::select("SELECT * FROM objetivo WHERE id_proyecto = ?", [$id]);
        $alcances = DB::select("SELECT * FROM alcance WHERE id_proyecto = ?", [$id]);
        $indicadores = DB::select("SELECT * FROM indicador WHERE id_proy = ?", [$id]);
        $solicitud = Solicitud::where('id_proy', $id)->first();
        if($solicitud->id_estado == 4){

        }else{
            if(count($objetivos) > 0 && count($alcances) > 0 && count($indicadores) > 0){
                $solicitud->id_estado = 2;
                
            } else{
                $solicitud->id_estado = 1;
            }
        }
    
        $solicitud->save();

        return view('proyectoViews.solicitud.Investigador.oai', [
            'objetivos'=> $objetivos,
            'alcances'=> $alcances,
            'indicadores'=> $indicadores,
            'id'=> $id,
        ]);
    }

    public function pre($id){
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
            'solicitud'=>$solicitud,
        ]);
    }

    //TODO validar
    public function enviar($id){
        $director = RolUsuario::where('role_id', 3)->first();
        $coordinador = RolUsuario::where('role_id', 2)->first();
        $proyecto = Proyecto::findOrFail($id);

        $solicitud = Solicitud::where('id_proy', $id)->first();
        $solicitud->enviada = true;
        $solicitud->noti_inv = true;
        $solicitud->modificable = false;

        if($solicitud->id_estado == 4){
            $solicitud->id_estado = 9;
        }else{
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
            $solicitud->id_estado = 3;
        }

        $solicitud->save();

        return redirect()->route('solicitud.mis_solicitudes');
    }

    public function solicitudes_evaluadas(){
        
        $solicitudes1 = DB::select(
            "SELECT S.id, P.nombre, COUNT(E.id), S.etapa FROM proyecto P 
            INNER JOIN solicitud S ON P.id = S.id_proy
            LEFT JOIN evaluacion E ON S.id = E.id_solicitud
            WHERE E.etapa = ? AND S.id_estado = ?
            GROUP BY S.id, P.nombre, E.etapa", [1, 3]
        );

        $solicitudes2 = DB::select(
            "SELECT S.id, P.nombre, COUNT(E.id), S.etapa FROM proyecto P 
            INNER JOIN solicitud S ON P.id = S.id_proy
            LEFT JOIN evaluacion E ON S.id = E.id_solicitud
            WHERE E.etapa = ? AND S.id_estado = ?
            GROUP BY S.id, P.nombre, E.etapa", [2, 3]
        );

        $solicitudes_corregidas1 = DB::select(
            "SELECT S.id, P.nombre, COUNT(E.id), S.etapa FROM proyecto P 
            INNER JOIN solicitud S ON P.id = S.id_proy
            LEFT JOIN evaluacion E ON S.id = E.id_solicitud
            WHERE E.etapa = ? AND S.id_estado = ? AND E.visible=?
            GROUP BY S.id, P.nombre, E.etapa", [1, 9, true]
        );

        $solicitudes_corregidas2 = DB::select(
            "SELECT S.id, P.nombre, COUNT(E.id), S.etapa FROM proyecto P 
            INNER JOIN solicitud S ON P.id = S.id_proy
            LEFT JOIN evaluacion E ON S.id = E.id_solicitud
            WHERE E.etapa = ? AND S.id_estado = ? AND E.visible=?
            GROUP BY S.id, P.nombre, E.etapa", [2, 9, true]
        );

        return view('proyectoViews.solicitud.Coordinador.solicitudes_evaluadas', [
            'solicitudes1' => $solicitudes1,
            'solicitudes2' => $solicitudes2,
            'solicitudes_corregidas1' => $solicitudes_corregidas1,
            'solicitudes_corregidas2' => $solicitudes_corregidas2,
            
        ]);
    }


    /*------------------------------------------------
                        SEGUNDA ETAPA
    ------------------------------------------------*/

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
        $evaluaciones = DB::select("SELECT * FROM evaluacion E JOIN estado_de_solicitud EDS WHERE E.id_solicitud = ? AND EDS.id = E.respuesta", [$id]);

        return view('proyectoViews.solicitud.Investigador.resumen', [
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
            'evaluaciones'=>$evaluaciones,
            'estados'=>$estados_soli,
            'miembros_comite'=>$miembros_comite,
            ]);
    }
    //TODO validar diferente
    public function factibilidad($id){
        $factibilidad = Factibilidad::where('id_proy', $id)->count();
        if($factibilidad == 0){
            return view('proyectoViews.factibilidad.create', [
                'id' => $id,
            ]);
        } else{
            return redirect()->route('factibilidad.edit', request('id'));
        }
        
    }
    //TODO validar diferente
    public function factibilidad_store(){
        request()->validate([
            'id'=> 'required',
            'tecnica' => 'max:1500',
            'economica' => 'max:1500',
            'financiera' => 'max:1500',
            'operativa' => 'max:1500',
            'extra' => 'max:1500'
        ],
        [
            'id.required' => "El proyecto es obligatorio",
            'tecnica.max' => "No debe exceder los 1500 carateres.",
            'economica.max' => "No debe exceder los 1500 carateres.",
            'financiera.max' => "No debe exceder los 1500 carateres.",
            'operativa.max' => "No debe exceder los 1500 carateres.",
            'extra.max' => "No debe exceder los 1500 carateres."
        ]);

        $factibilidad = new Factibilidad();
        $factibilidad->id_proy = request('id');
        $factibilidad->tecnica = request('tecnica');
        $factibilidad->economia = request('economica');
        $factibilidad->financiera = request('financiera');
        $factibilidad->operativa = request('operativa');
        $factibilidad->fac_extra = request('extra');
        $factibilidad->save();

        return redirect()->route('miembros.index', request('id'));
    }

    public function factibilidad_edit($id){
        $factibilidad = Factibilidad::where('id_proy', $id)->first();
        return view('proyectoViews.factibilidad.edit', [
            'id' => $id,
            'factibilidad' => $factibilidad
        ]);
    }

    public function factibilidad_update(){
        request()->validate([
            'id'=> 'required',
            'tecnica' => 'max:1500',
            'economica' => 'max:1500',
            'financiera' => 'max:1500',
            'operativa' => 'max:1500',
            'extra' => 'max:1500'
        ],
        [
            'id.required' => "El proyecto es obligatorio",
            'tecnica.max' => "No debe exceder los 1500 carateres.",
            'economica.max' => "No debe exceder los 1500 carateres.",
            'financiera.max' => "No debe exceder los 1500 carateres.",
            'operativa.max' => "No debe exceder los 1500 carateres.",
            'extra.max' => "No debe exceder los 1500 carateres.",
        ]);

        $factibilidad = Factibilidad::where('id_proy', request('id'))->first();
        $factibilidad->tecnica = request('tecnica');
        $factibilidad->economia = request('economica');
        $factibilidad->financiera = request('financiera');
        $factibilidad->operativa = request('operativa');
        $factibilidad->fac_extra = request('extra');
        $factibilidad->save();

        return redirect()->route('miembros.index', request('id'));
    }

    public function pre2($id){

        $proyecto = Proyecto::findOrFail($id);
        $solicitud = Solicitud::where('id_proy', $proyecto->id)->first();
        $equipo = EquipoDeInvestigacion::findOrFail($proyecto->id_equipo);
        $factibilidad = Factibilidad::where('id_proy', $id)->first();
        $miembros= DB::select('SELECT * FROM users INNER JOIN usuario_equipo_rol ON users.id = usuario_equipo_rol.id_usuario AND id_equipo = ?', [$equipo->id]);
        $roles = DB::select('SELECT * FROM roles WHERE tipo_rol = ?', [true]);
        $idUsuarioLogeado=auth()->user()->id;
        $usuarioEquipoRol= UsuarioEquipoRol::where('id_equipo', $equipo->id)->where('id_usuario', $idUsuarioLogeado)->firstOr(function(){
            abort(403);
        });
        $indicadores= Indicador::where('id_proy',$id)->get();
        $miembrosEquipo= User::whereRaw('id in (select id_usuario from usuario_equipo_rol where id_equipo= ?)',[$equipo->id])->get();

        return view('proyectoViews.solicitud.Investigador.previsualizacion2', [
            'factibilidad' => $factibilidad,
            'miembros' => $miembros,
            'roles'=>$roles,
            'idProyecto'=>$id, 
            'indicadores'=>$indicadores, 
            'miembrosEquipo'=>$miembrosEquipo,
            'solicitud'=>$solicitud,
            
        ]);
    }

    public function enviar2($id){
        $solicitud = Solicitud::where('id_proy', $id)->first();
        $solicitud->enviada = true;

        if($solicitud->id_estado == 6){
            $solicitud->id_estado = 9;
        }else{
            $solicitud->id_estado = 3;
        }
        
        $solicitud->noti_inv = true;
        $solicitud->modificable = false;
        $solicitud->save();

        return redirect()->route('solicitud.mis_solicitudes');
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
