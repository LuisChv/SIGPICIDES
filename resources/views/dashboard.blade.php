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
                            <h2 class="card-title"><b>INVESTIGACIONES & PROYECTOS</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <a href="#">Desarrollo de Sistema de Transacciones utilizando Minería de datos.</a>
                </div>
                <div class="card-body">
                        <a href="#">Traductor LESSA-Español empleando sensores y Machine Learning.</a>
                </div>
                <div class="card-body">
                        <a href="#">Sistema de validación de tarjetas magnéticas.</a>
                </div>
                <div class="card-body">
                        <a href="#">Encriptación de datos con BlockChain.</a>
                </div>
                <div class="card-body">
                        <a href="#">Dectectores de residuos bioinfecciosos en salas hospitalarias.</a>
                </div>
                <div class="card-body">
                        <a href="#">Programa de enseñanza de la programación a temprana edad.</a>
                </div>
                <div class="card-body">
                        <a href="#">Sistema Geográfico para el monitoreo del COVID-19 en El Salvador.</a>
                </div>
                <div class="card-body">
                        <a href="#">Machine Learning en la detección de posibles casos de COVID-19.</a>
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