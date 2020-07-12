@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Cat&aacute;logo de tipos de investigaci&oacute;n 
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Catálogo de tipos de investigaci&oacute;n</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--NUEVO RECURSO-->
                    <div class="container">
                        <a role="button" class="btn btn-primary col-sm-2" href="{{ route('tipo_investigacion.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Tipo
                        </a>
                        <a role="button" class="btn btn-primary col-sm-2" href="{{ route('tipo_investigacion.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Subtipo
                        </a>
                    </div>                    
                    <!--Dropdown para recurso-->
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        <div class="list-group">
                            <div class="card list-group-item">
                                <div role="tab" id="rec1">
                                    <a data-toggle="collapse" data-toggle="collapse" data-target="#lista1" aria-expanded="false" aria-controls="lista1">
                                      Tipo de investigaci&oacute;n 1&nbsp;&nbsp;

                                        <i class="tim-icons icon-minimal-down"></i>
                                    </a>
                                </div>
                                <div id="lista1" class="collapse" aria-labelledby="rec1" data-parent="#accordion">
                                  <div class="list-group">                        
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 1</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 2</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 3</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 4</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>

                                    </div>
                                </div>
                            </div>                      
                        </div>
                        <!--fin de dropdown-->
                        <div class="card list-group-item">
                                <div role="tab" id="rec2">
                                    <a data-toggle="collapse" data-toggle="collapse" data-target="#lista2" aria-expanded="false" aria-controls="lista2">
                                      Tipo de investigaci&oacute;n 2&nbsp;&nbsp;

                                        <i class="tim-icons icon-minimal-down"></i>
                                    </a>
                                </div>
                                <div id="lista2" class="collapse" aria-labelledby="rec2" data-parent="#accordion">
                                  <div class="list-group">                        
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 1</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 2</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 3</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                    <div class="list-group-item col-sm-7">
                                        <i class="tim-icons icon-planet"></i>
                                        <a href="#">&nbsp;Subtipo de investigaci&oacute;n 4</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>

                                    </div>
                                </div>
                            </div>                      
                        </div>
                    </div>                   
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
</div>
@endsection