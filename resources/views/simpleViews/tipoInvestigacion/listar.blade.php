@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Cat&aacute;logo de tipos de investigaci&oacute;n 
@endsection
@section('content')
<div class="row">
	<div class="col-6">
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
                                        <a>
                                            {{ $tipo->nombre }}&nbsp;&nbsp;
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </a>
                                    </div>
                                    <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                        <div class="list table-sm">
                                        @foreach($sub_tipos as $sub_tipo)
                                        @if($sub_tipo->id_tipo==$tipo->id)
                                        <div class="container">
                                            <div class="row">                     
                                                <div class="col-sm-5">
                                                    <i class="tim-icons icon-planet"></i>
                                                    <a href="#">&nbsp;{{ $sub_tipo->nombre }}</a>
                                                </div>
                                                <div class="col-sm-1">
                                                    <div class="row">
                                                        <a type="button" href="tipo_investigacion/{{$sub_tipo->id}}/edit" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>&nbsp;&nbsp;
                                                        <form method="POST" action="/tipo_investigacion/{{$sub_tipo->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div> 
                                        </div>
                                    @endif
                                    @endforeach
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
</div>
@endsection