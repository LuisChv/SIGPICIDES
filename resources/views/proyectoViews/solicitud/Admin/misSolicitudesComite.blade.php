@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="card-title"><b>Solicitudes Pendientes a evaluar</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la primera etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    @foreach ($solicitudes1 as $soli)
                                        @if ($soli->etapa == 1)
                                        <tr>
                                        
                                            <td width="70%">
                                                <p>{{ $soli->nombre }}</p> 
                                            </td>
                                            <td width="15%">
                                                <a href="{{ route('evaluacion.index', [$soli->id_proy])     }}" type="button" class="btn btn-primary btn-sm btn-round">
                                                    <i class="tim-icons icon-send"></i> Evaluar solicitud
                                                </a>
                                            </td>
                                        </tr>
                                        @endif                      
                                        @endforeach
                                        @foreach ($solicitudes_corregidas1 as $soli)
                                            @if ($soli->etapa == 1)
                                            <tr>
                                            
                                                <td width="70%">
                                                    <p>{{ $soli->nombre }}</p> 
                                                </td>
                                                <td width="15%">
                                                    <a href="{{ route('evaluacion.index', [$soli->id_proy])     }}" type="button" class="btn btn-primary btn-sm btn-round">
                                                        <i class="tim-icons icon-send"></i> Evaluar solicitud
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif                      
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="card-title"><b>Solicitudes en la segunda etapa</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    @foreach ($solicitudes2 as $soli)
                                    @if ($soli->etapa == 2)
                                    <tr>
                            
                                        <td width="70%">
                                            <p>{{ $soli->nombre }}</p> 
                                        </td>
                                        <td width="15%">
                                            <a href="{{ route('evaluacion2.index', [$soli->id_proy])     }}" type="button" class="btn btn-primary btn-sm btn-round">
                                                <i class="tim-icons icon-send"></i> Evaluar solicitud
                                            </a>
                                        </td>
                                    </tr>
                                    @endif                       
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection