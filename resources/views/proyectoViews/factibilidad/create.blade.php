@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Factibilidad
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route('factibilidad.store')}}">
            <div class="card">
                <div class="card-header ">
                    <h2 class="card-title"><b>Factibilidad</b></h2>
                </div>
                <div class="card-body">                    
                    @csrf                    
                            <textarea maxlength="1050" class="inputArea" rows="5" name="economica" placeholder="Factibilidad económica"></textarea>
                        <br>                        
                            <textarea maxlength="1050" class="inputArea" rows="5" name="financiera" placeholder="Factibilidad financiera"></textarea>
                        <br>                        
                            <textarea maxlength="1050" class="inputArea" rows="5" name="operativa" placeholder="Factibilidad operativa"></textarea>
                        <br>                        
                            <textarea maxlength="1050" class="inputArea" rows="5" name="tecnica" placeholder="Factibilidad técnica"></textarea>
                        <br>                        
                            <textarea maxlength="1050" class="inputArea" rows="5" name="extra" placeholder="Factibilidad extra"></textarea>                                                              
                </div>
            </div>
            <table width="100%">
                <tr>
                    <td width="50%">
                        <a class="btn btn-primary" href="{{ route('solicitud.resumen', [$id])}}">
                            Anterior
                        </a>
                    </td>
                    <td width="50%" align="right">
                    <input hidden name="id" value="{{$id}}">
                        <button type="submit" class="btn btn-primary">{{ __('Siguiente') }}</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
    
    <!--
    <div class="container menuF-container">
        <input type="checkbox" id="toggleF">
        <label for="toggleF" class="buttonF"></label>
        <nav class="navF">
            <a href="{{ route('solicitud.create')}}">Recursos</a>
            <a href="{{ route('solicitud.create')}}">Factibilidad</a>
            
            <a href="{{ route('solicitud.create')}}">Planificación</a>
            <a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a>
                </nav>
            </div>
        </div>
        -->
        @endsection