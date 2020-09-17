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
                        <h2 class="card-title"><b>Solicitudes en Proceso</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($solicitudes as $soli)
                    @if($soli->enviada==false)
                    <tr>
                        <td width="40%">
                            <p>{{ $soli->nombre }}</p> 
                        </td>
                        <td width="30%">
                            <p>{{ $soli->estado }}</p> 
                        </td>
                        <td width="15%">
                            <div class="btn-group" role="group">
                                <a title="Información principal" type="button" class="btn btn-primary btn-sm btn-round" href="{{ route('solicitud.edit', [$soli->id_proy])}}">
                                    <i class="tim-icons icon-notes"></i>
                                </a>
                                <a title="Objetivos, alcances e indicadores" type="button" class="btn btn-primary btn-sm btn-icon btn-round" href="{{ route('proyecto.oai', [$soli->id_proy])}}">
                                    <i class="tim-icons icon-spaceship"></i>
                                </a>
                                <a title="Recursos" type="button" class="btn btn-primary btn-sm btn-icon btn-round" href="{{ route('proyecto_recursos.create', [$soli->id_proy])}}">
                                    <i class="tim-icons icon-laptop"></i>
                                </a>
                                <a title="Eliminar" type="button" class="btn btn-warning btn-sm btn-icon btn-round" href="">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </a>
                            </div>
                        </td>
                        <td width="15%" class="text-right">
                            <a href="{{ route('solicitud.pre', [$soli->id_proy])}}" type="button" class="btn btn-primary btn-sm btn-round">
                                <i class="tim-icons icon-zoom-split"></i> Vista previa
                            </a>
                        </td>
                    </tr>
                    @endif                  
                    @endforeach
                </table>
            </div>
            <div class="card-footer"><br></div>
        </div>

        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Solicitudes Enviadas</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($solicitudes as $soli)
                    @if ($soli->enviada)
                    <tr>
                        <td width="40%">
                            <p>{{ $soli->nombre }}</p> 
                        </td>
                        <td width="45%">
                            <p>{{ $soli->estado }}</p> 
                        </td>
                        </td>
                        <td width="15%" class="text-right">
                            <a  href="{{ route('solicitud.pre', [$soli->id_proy])}}" type="button" class="btn btn-primary btn-sm btn-round">
                                <i class="tim-icons icon-zoom-split"></i> Vista previa
                            </a>
                        </td>
                    </tr>    
                    @endif                    
                    @endforeach
                </table>
            </div>
            <div class="card-footer"><br></div>
        </div>
    </div>
</div>
@endsection