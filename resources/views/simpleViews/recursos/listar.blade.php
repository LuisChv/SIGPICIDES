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
                        <div class="col-sm-2">
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
                                <div class="list- table-sm">
                                @foreach($recursos as $rec)
                                @if($rec->id_tipo==$tipo->id)                        
                                <div class="list-group-item col-sm-7">
                                    <i class="tim-icons icon-planet"></i>
                                    <a href="#">&nbsp;{{ $rec->nombre }}</a>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
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