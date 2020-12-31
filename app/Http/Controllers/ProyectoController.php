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
        $proyecto = Proyecto::where('proyecto.id',$id)
        ->join('estado_de_proy','proyecto.id_estado','estado_de_proy.id')
        ->select('proyecto.*', 'estado_de_proy.estado')
        ->first();        
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
        $estados=DB::table('estado_de_proy')->get();

        return view('proyectoViews.mis_proyectos.resumen', [
            'objetivos'=> $objetivos, 'alcances'=> $alcances, 'indicadores'=> $indicadores,
            'proyecto' => $proyecto, 'equipo' => $equipo, 't' => $tipo, 'st' => $subtipo,
            'tiposrec'=>$tiposrec, 'recursos'=>$recursos, 'recursosProy'=>$recursosProy,
            'solicitud'=>$solicitud, 'evaluaciones'=>$evaluaciones, 'estados'=>$estados_soli,
            'miembros_comite'=>$miembros_comite, 'factibilidad' => $factibilidad, 'miembros' => $miembros,
            'roles'=>$roles, 'miembrosEquipo'=>$miembrosEquipo, 'estados'=>$estados,
            ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cambiarEstado(Request $request, $id)
    {        
        $proyecto= Proyecto::findOrFail($id);
        $proyecto->id_estado=$request->estadoProy;
        $proyecto->save();
        return back();
        //return back()->withErrors('Todos los campos son obligatorios');
        return redirect()->route('estado_resultado_create', $id_periodo)->with('status', 'Cuenta '.$request->nombre.' creada exitosamente');
    }

    //Controlador de la vista para mostrar todos los proyectos
    public function index()
    {
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
        $proyectos=DB::table('proyecto')->paginate(10);
        //Proyectos que apareceran en el buscador
        $proyectosBuscador=DB::table('proyecto')->get();
        $estados=DB::table('estado_de_proy')->get();
        //dd($proyectos[0]);
        return view('proyectoViews.proyectos', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos, 
        'estados'=>$estados, 'estadoElegido'=>0, 'proyectosBuscador'=>$proyectosBuscador]);
    }
    //Proyectos filtrados
    public function indexFiltrado(Request $request)
    {
        dd($request->request);
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
        //Traer los proyectos segun los filtros indicados
        //Si tisubti es 0 quiere decir que hay que traer todos los proyectos
        if($request->tisubti==0){
            if($request->estadoProy==0){ 
                $proyectos=DB::table('proyecto')->paginate(10)->appends(request()->query());
            }else{
                $proyectos=DB::table('proyecto')->where('id_estado',$request->estadoProy)->paginate(10)->appends(request()->query());
            }
            
        }
        else{
            //Si es 1 quiere decir que es filtro por tipo de proyecto (incluye varias subtipos)
            if($request->tisubti==1){
                $where="id_subtipo in 
                (select id from subtipo_de_investigacion where id_tipo=
                (select id from tipo_de_investigacion where nombre=?))";
            }
            //Si es 2 quiere decir que es filtro por subtipo de proyecto
            if($request->tisubti==2){
                $where="id_subtipo= 
                (select id from subtipo_de_investigacion where nombre=?)";
            }
            //Si el estado es 0 quiere decir que no importa el estado
            if($request->estadoProy==0){                
                $proyectos=DB::table('proyecto')                
                ->whereRaw($where,[$request->nombre])
                ->paginate(10)
                ->appends(request()->query());
            }
            //Si es diferente a 0, hay que treaer los proyectos con el estado que fue indicado
            else{
                $where=$where."and id_estado= ?";
                $proyectos=DB::table('proyecto')
                ->whereRaw($where,[$request->nombre, $request->estadoProy])
                ->paginate(10)
                ->appends(request()->query());
            }
            
        }        
        //dd($request->request);
        $estados=DB::table('estado_de_proy')->get();
        //Proyectos que apareceran en el buscador
        $proyectosBuscador=DB::table('proyecto')->get();     
        return view('proyectoViews.proyectos', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos, 
        'estados'=>$estados, 'nombreElegido'=>$request->nombre, 'estadoElegido'=>$request->estadoProy, 
        'tisubtiElegido'=>$request->tisubti, 'proyectosBuscador'=>$proyectosBuscador]);
    }
    
}
