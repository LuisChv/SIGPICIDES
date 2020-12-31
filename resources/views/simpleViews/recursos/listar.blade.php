@extends('layouts.app',['pageSlug' => 'recursos'])
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
                            <div>
                                <table width='100%'>
                                    <tr class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                        <td>
                                            {{ $tipo->nombre }}&nbsp;&nbsp;
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </td>
                                    </tr>
                                </table>
                                <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach($recursos as $rec)
                                            @if($rec->id_tipo==$tipo->id)  
                                                <tr>                     
                                                    <td width='85%' id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('{{ route('recursos.show', $rec->id)}}');" >
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{ $rec->nombre }}
                                                    </td>
                                                    <form method="POST" id="formulario{{$rec->id}}" action="{{route('recursos.destroy', $rec->id)}}" >
                                                        <td width='10%' align="right">
                                                            <div class="btn-group" role="group">
                                                                <a type="button" href="{{ route('recursos.edit', $rec->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round">
                                                                    <i class="tim-icons icon-pencil"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" onClick="confirmar({{$rec->id}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar">
                                                                    <i class="tim-icons icon-simple-remove"></i>
                                                                </button> 
                                                            </div>
                                                        </td>
                                                    </form>
                                                    <td width="5%">
                                                        @isset($recurso)
                                                            @if ($recurso->id == $rec->id)
                                                                <i class="tim-icons icon-double-right"></i>
                                                            @endif
                                                        @endisset
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
    @yield('opcion')
</div>
@endsection