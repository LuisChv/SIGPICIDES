<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
        $proyectos=DB::table('proyecto')->paginate(15);
        $estados=DB::table('estado_de_proy')->get();
        //dd($proyectos[0]);
        return view('dashboard', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos, 
        'estados'=>$estados, 'estadoElegido'=>0]);
    }
    public function indexFiltrado(Request $request)
    {
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
        //Traer los proyectos segun los filtros indicados
        //Si tisubti es 0 quiere decir que hay que traer todos los proyectos
        if($request->tisubti==0){
            if($request->estadoProy==0){ 
                $proyectos=DB::table('proyecto')->paginate(15);
            }else{
                $proyectos=DB::table('proyecto')->where('id_estado',$request->estadoProy)->paginate(15);
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
                ->paginate(15);
            }
            //Si es diferente a 0, hay que treaer los proyectos con el estado que fue indicado
            else{
                $where=$where."and id_estado= ?";
                $proyectos=DB::table('proyecto')
                ->whereRaw($where,[$request->nombre, $request->estadoProy])
                ->paginate(15);
            }
            
        }        
        //dd($request->request);
        $estados=DB::table('estado_de_proy')->get();        
        return view('dashboard', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos, 
        'estados'=>$estados, 'nombreElegido'=>$request->nombre, 'estadoElegido'=>$request->estadoProy, 
        'tisubtiElegido'=>$request->tisubti]);
    }

}
