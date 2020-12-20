<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstadisticaController extends Controller
{
    public function general(){
    	$recursos = DB::SELECT(
    		"SELECT R.nombre, SUM(RPP.cantidad) FROM recurso R LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY R.id"
    	);

    	$marcas = DB::SELECT(
    		"SELECT M.nombre, SUM(RPP.cantidad) FROM marca M JOIN
			recurso R ON M.id = R.id_marca LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY M.id"
    	);

    	$tipo_recurso = DB::SELECT(
    		"SELECT T.nombre, SUM(RPP.cantidad) FROM tipo_de_recurso T JOIN
			recurso R ON T.id = R.id_tipo LEFT JOIN
    		recursos_por_proy RPP ON R.id = RPP.id_recurso
    		GROUP BY T.id"
    	);

    	$tipo_investigacion = DB::SELECT(
    		"SELECT TDI.nombre, COUNT(P.id) FROM tipo_de_investigacion TDI JOIN
			subtipo_de_investigacion SDI ON SDI.id_tipo = TDI.id LEFT JOIN
			proyecto P ON SDI.id = P.id_subtipo
			GROUP BY TDI.id"
    	);

    	$subtipo_investigacion = DB::SELECT(
    		"SELECT SDI.nombre, COUNT(P.id) FROM subtipo_de_investigacion SDI LEFT JOIN
			proyecto P ON SDI.id = P.id_subtipo
			GROUP BY SDI.id"
    	);

    	dd($recursos, $marcas, $tipo_recurso, $tipo_investigacion, $subtipo_investigacion);

    	return view("statsViews.index");
    }
}
