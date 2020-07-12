<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    protected $table = 'recurso';
    //protected $primaryKey = 'flight_id';          Para sobreescribir la llave primaria 
    //public $incrementing = false;                 Para que eloquent sepa que la llave primaria no es autoincremental
    //protected $keyType = 'string';                Para que eloquent sepa que no es una llave numerica
    //public $timestamps = false;                   Para que eloquent no maneje los timestamps
    //protected $dateFormat = 'U';                  Para modificar el formato de dia en el modelo
    //const CREATED_AT = 'creation_date';           Para modificar los nombres de las columnas utilizadas para guardar las fechas
    //const UPDATED_AT = 'last_update';
    //protected $connection = 'connection-name';    Para especificar una conexion diferente a BD
    //protected $attributes = ['delayed' => false,];    Para agregar un valor por default a un atributo





    /* QUERYS
    ------Listar-----------
    $flights = App\Flight::all();

    foreach ($flights as $flight) {
    echo $flight->name;
    
    $titles = DB::table('roles')->pluck('title');


    ------Listar solo una columna-----------
    foreach ($titles as $title) {
        echo $title;
    }
    $users = DB::table('users')->select('name', 'email as user_email')->get();


    ------Listar con parametros-----------
    $flights = App\Flight::where('active', 1)->orderBy('name', 'desc')->take(10)->get();


    ------Consultar record especifico-----------
    $flight = App\Flight::where('active', 1)->first();


    ------Funciones de Agregacion-----------
    $count = App\Flight::where('active', 1)->count();
    $max = App\Flight::where('active', 1)->max('price');


    ------Eliminar-----------
    $flight->delete();
    App\Flight::destroy(PrimaryKey);



    ------Raw Querys-----------
    $users = DB::table('users')
                     ->select(DB::raw('count(*) as user_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('status')
                     ->get();


    
    $orders = DB::table('orders')
                ->selectRaw('price * ? as price_with_tax', [1.0825])
                ->get();

                

    */


    
}
