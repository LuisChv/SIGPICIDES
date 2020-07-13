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
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('tipo_investigacion.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Tipo
                                </a>
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('subtipo_investigacion.create')  }}">
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
                                <div class="list-group-item list-group-flush">
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
                                                            {{ $sub_tipo->nombre }}
                                                        </td>
                                                        <td width='10%'>
                                                                <a type="button" href="{{ route('subtipo_investigacion.edit', $sub_tipo->id)  }}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>                                                        
                                                            </td>
                                                        <td width='10%'>
                                                                <a type="button" href="{{ route('subtipo_investigacion.edit', $sub_tipo->id)  }}" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>                                                        
                                                            </td>
                                                        </td>
                                                    </tr>
                                            @endif
                                        @endforeach
                                        </table>
                                    </div>                                         
                                </div>
                            @endforeach   
                            <br>                
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