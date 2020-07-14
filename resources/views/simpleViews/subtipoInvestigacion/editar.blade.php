@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Nuevo Subtipo de investigación
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
	<div class="col-5">
        <div class="card">
            <div class="card-header ">
                <h2 class="card-title"><b>Editar subtipo de investigación</b></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('subtipo_investigacion.update', $subtipo->id)}}">
                        @csrf
                        @method('PUT')           
                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                                <option value="" selected disabled hidden>Seleccione un tipo de investigación</option>
                                @foreach ($tiposinv as $tipo)
                                    @if ($subtipo->id_tipo==$tipo->id)
                                        <option value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                    @else
                                        <option value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'tipoRec'])                            
                        </div>
                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" value="{{$subtipo->nombre}}" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Editar') }}</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection