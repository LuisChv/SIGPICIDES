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
        //dd($proyectos[0]);
        return view('dashboard', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos]);
    }
    public function indexFiltrado(Request $request)
    {
        $tiposProy=DB::table('tipo_de_investigacion')->get();
        $subtiposProy=DB::table('subtipo_de_investigacion')->get();;
        //$proyectos=DB::table('proyecto')->paginate(15);
        dd($request->request);
        //dd($proyectos[0]);
        return view('dashboard', ['tiposProy' => $tiposProy, 'subtiposProy' => $subtiposProy, 'proyectos'=>$proyectos]);
    }

}
