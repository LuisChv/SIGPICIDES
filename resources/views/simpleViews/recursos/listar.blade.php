@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Recursos 
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Recursos disponibles</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--NUEVO RECURSO-->
                    <div class="col-sm-2">
                        <a role="button" class="btn btn-primary" href="{{ route('recursos.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                    <!--Dropdown para recurso-->
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        <div class="list-group">
                            @foreach ($tiposrec as $tipo)
                            <div class="card list-group-item">
                                <div role="tab" id="rec1">
                                    <a data-toggle="collapse" data-toggle="collapse" data-target="#lista1" aria-expanded="false" aria-controls="lista1">
                                      {{ $tipo->nombre }}&nbsp;&nbsp;
                                        <i class="tim-icons icon-minimal-down"></i>
                                    </a>
                                </div>
                                <div id="lista1" class="collapse" aria-labelledby="rec1" data-parent="#accordion">
                                    <div class="list-group">
                                    @foreach($recursos as $rec)
                                    @if($rec->id_tipo==$tipo->id)                        
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="/recursos/{{$rec->id}}/edit">&nbsp;{{ $rec->nombre }}</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
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
                <div class="card-footer"><br></div>
            </div>
        </div>
    </div>
</div>
@endsection