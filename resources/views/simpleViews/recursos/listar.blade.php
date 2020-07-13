@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Recursos 
@endsection
@section('content')
<div class="row">
	<div class="col-7">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Recursos disponibles</b></h2>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a role="button" class="btn btn-primary" href="{{ route('recursos.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">                
                    <!--Dropdown para recurso-->
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="list-group">
                        @foreach ($tiposrec as $tipo)
                        <div class="list-group-item list-group-flush">
                            <div role="tab" id="rec{{ $tipo->id }}">
                                <a data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                    {{ $tipo->nombre }}&nbsp;&nbsp;
                                    <i class="tim-icons icon-minimal-down"></i>
                                </a>
                            </div>
                            <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                <div class="list- table-sm-12">
                                    @foreach($recursos as $rec)
                                        @if($rec->id_tipo==$tipo->id) 
                                            <div class="container">  
                                                <div class="row" id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('#');">                     
                                                    <div class="col-sm-10 my-auto">
                                                        <i class="tim-icons icon-planet"></i>
                                                        <a  href="recursos/{{$rec->id}}">&nbsp;{{ $rec->nombre }}</a>
                                                    </div>
                                                    <div class="col-sm-2 my-auto">
                                                        <div class="row">
                                                            <a type="button" href="recursos/{{$rec->id}}/edit" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>&nbsp;&nbsp;
                                                            <form method="POST" action="/recursos/{{$rec->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>                      
                        </div>
                        @endforeach
                        <!--fin de dropdown-->
                    </div>                   
                </div>
            </div>
            <div class="card-footer"><br></div>
        </div>
    </div>
</div>
@endsection

<script langiage="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#C9EFFE';
    }
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila, color) {
    document.getElementById(id_fila).style.backgroundColor = color;
    }
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
    location.href=url;
    }
</script>