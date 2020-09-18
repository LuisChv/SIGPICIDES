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
                        <h2 class="card-title"><b>Solicitudes Pendientes de Evaluar</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($solicitudes as $soli)
                    @if( $soli->id_estado == 3 )
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
            <div class="card-footer"><br></div>
        </div>

    </div>
</div>
@endsection