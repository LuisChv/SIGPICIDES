@extends('layouts.app',['pageSlug' => 'solicitudes_evaluadas'])
@section('title')
	Solicitudes evaluadas
@endsection
@section('content')
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
                    @foreach ($solicitudes as $solicitud)
                        @if ($solicitud->count == 3 && $solicitud->etapa == 1)
                            <tr>
                                <td><i class="tim-icons icon-check-2"></i> {{$solicitud->nombre}}</td>
                                <td width="15%" class="text-right">
                                    <a href="" type="button" class="btn btn-primary btn-sm btn-round">
                                        <i class="tim-icons icon-book-bookmark"></i> Ver evaluaciones
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
                    @foreach ($solicitudes as $solicitud)
                        @if ($solicitud->count == 6 && $solicitud->etapa == 2)
                            <tr>
                                <td>{{$solicitud->nombre}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection