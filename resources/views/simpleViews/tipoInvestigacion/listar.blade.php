@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Cat&aacute;logo de tipos de investigaci&oacute;n 
@endsection
@section('content')
<div class="row">
	<div class="col-7">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Catálogo de tipos de investigaci&oacute;n</b></h2>
                        </div>
                        <div class="col-sm-12 text-right">
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('tipo_investigacion.createTipo')  }}">
                                    <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Tipo
                                </a>
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('tipo_investigacion.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Subtipo
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <br/>                    
                    <!--Dropdown para recurso-->
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        <div class="list-group">
                            @foreach ($tipos as $tipo)
                                <div class="card list-group-item">
                                    <div role="tab" id="rec{{ $tipo->id }}">
                                        <a data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                            {{ $tipo->nombre }}&nbsp;&nbsp;
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </a>
                                    </div>
                                    <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                        <table width='100%'>
                                        @foreach($sub_tipos as $sub_tipo)
                                            @if($sub_tipo->id_tipo==$tipo->id) 
                                                    <tr id={{$sub_tipo->id}} onMouseOver="ResaltarFila({{$sub_tipo->id}});" onMouseOut="RestablecerFila({{$sub_tipo->id}}, '')" onClick="CrearEnlace('#');">                     
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <i class="tim-icons icon-planet"></i>
                                                            <a  href="recursos/{{$sub_tipo->id}}">&nbsp;{{ $sub_tipo->nombre }}</a>
                                                        </td>
                                                        <td width='10%'>
                                                                <a type="button" href="tipo_investigacion/{{$sub_tipo->id}}/edit" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>&nbsp;&nbsp;
                                                                <form method="POST" action="/tipo_investigacion/{{$sub_tipo->id}}">
                                                        </td>
                                                        <td width='10%'>
                                                                @csrf
                                                                @method('DELETE')
                                                                    <button type="submit" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                                                </form> 
                                                        </td>
                                                    </tr>
                                            @endif
                                        @endforeach
                                        </table>
                                    </div>                                         
                                </div>
                            @endforeach                   
                        </div>
                    </div>                   
                </div>
                <div class="card-footer"></div>
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