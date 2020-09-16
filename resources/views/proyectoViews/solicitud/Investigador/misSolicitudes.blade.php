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
                            <h2 class="card-title"><b>Mis solicitudes</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($solicitudes as $soli)
                        <tr>
                            <td width="70%">
                                <p>{{ $soli->nombre }}</p> 
                            </td>
                            <td width="15%">
                                <div class="btn-group" role="group">
                                    <a title="Información principal" type="button" class="btn btn-primary btn-sm btn-round" href="{{ route('solicitud.edit', [$soli->id_proy])}}">
                                        <i class="tim-icons icon-notes"></i>
                                    </a>
                                    <a title="Objetivos, alcances e indicadores" type="button" class="btn btn-info btn-sm btn-icon btn-round" href="{{ route('proyecto.oai', [$soli->id_proy])}}">
                                        <i class="tim-icons icon-spaceship"></i>
                                    </a>
                                <a title="Recursos" type="button" class="btn btn-info btn-sm btn-icon btn-round" href="{{ route('proyecto_recursos.create', [$soli->id_proy])}}">
                                        <i class="tim-icons icon-laptop"></i>
                                    </a>
                                    <a title="Eliminar" type="button" class="btn btn-warning btn-sm btn-icon btn-round" href="">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                </div>
                            </td>
                            <td width="15%">
                                <a href="{{ route('solicitud.enviar', [$soli->id_proy]) }}" type="button" class="btn btn-primary btn-sm btn-round">
                                    <i class="tim-icons icon-send"></i> Enviar solicitud
                                </a>
                            </td>
                        </tr>                        
                        @endforeach
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
</div>
@endsection