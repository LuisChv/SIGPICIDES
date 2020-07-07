@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('title')
    INSERTAR TITULO AQUI
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title"><b>INSERTAR TITULO</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        INSERTAR CONTENIDO
                </div>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>

            <nav class="navF">
                <a href="#">Inicio</a>
                <a href="#">Contactame</a>
                <a href="#">Acerca de</a>
                <a href="#">Acciones</a>
            </nav>
        </div>
    </div>
    @endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush