@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Solicitudes Aprobadas</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($solicitudes_A as $soli)
                        <tr>
                            <td>
                                <p>{{ $soli->nombre }}</p> 
                            </td>
                            <td width="5%" align="right">
                                <div class="btn-group" role="group">
                                    
                                    <a title="Ver Detalle" type="button" class="btn btn-success btn-sm btn-icon btn-round" href="">
                                        <i class="tim-icons icon-simple-"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        @endforeach
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Solicitudes Aprobadas Parcialmente</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($solicitudes_AP as $soli)
                        <tr>
                            <td>
                                <p>{{ $soli->nombre }}</p> 
                            </td>
                            <td width="5%" align="right">
                                <div class="btn-group" role="group">
                                    
                                    <a title="Ver Detalle" type="button" class="btn btn-success btn-sm btn-icon btn-round" href="">
                                        <i class="tim-icons icon-simple-"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        @endforeach
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Solicitudes Rechazadas</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($solicitudes_R as $soli)
                        <tr>
                            <td>
                                <p>{{ $soli->nombre }}</p> 
                            </td>
                            <td width="5%" align="right">
                                <div class="btn-group" role="group">
                                    
                                    <a title="Ver Detalle" type="button" class="btn btn-success btn-sm btn-icon btn-round" href="">
                                        <i class="tim-icons icon-simple-"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        @endforeach
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
    </div>
</div>
@endsection