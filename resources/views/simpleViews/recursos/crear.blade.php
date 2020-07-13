@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Nuevo recurso
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
                                <table width='100%'>
                                    @foreach($recursos as $rec)
                                        @if($rec->id_tipo==$tipo->id)  
                                            <tr id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('{{ route('recursos.show', $rec->id)}}');">                     
                                                <td>
                                                </td>
                                                <td>
                                                    <i class="tim-icons icon-planet"></i>
                                                    &nbsp;{{ $rec->nombre }}
                                                </td>
                                                <td width='10%' align="right">
                                                    <a type="button" href="{{ route('recursos.edit', $rec->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>&nbsp;&nbsp;
                                                </td>
                                                <td width='10%'>
                                                    <a type="button" href="{{ route('recursos.edit', $rec->id)}}" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
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
	<div class="col-5">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Nuevo recurso</b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/recursos">
                @csrf 
                        <div class="input-group {{ $errors->has('tiposrec') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="tiposrec" name="tiposrec">
                                <option value="" selected disabled hidden>Seleccione un tipo de recurso</option>
                                    @foreach ($tiposrec as $tipo)
                                        <option>{{ $tipo->nombre }}</option>
                                    @endforeach
                            </select>                            
                        </div>

                        <div class="input-group {{ $errors->has('marca') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="marca" name="marca">
                                <option value="" selected disabled hidden>Seleccione una marca</option>
                                    @foreach ($marcas as $marca)
                                        <option>{{ $marca->nombre }}</option>
                                    @endforeach
                            </select>                             
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="modelo" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="{{ __('Modelo') }}">
                            @include('alerts.feedback', ['field' => 'modelo'])
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input rows="3" type="text" rows="3" name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción') }}">
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Crear') }}</button>
                    </div>
                    <br>
                </form>
            </div>
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