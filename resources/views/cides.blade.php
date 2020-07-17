@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('title')
    Acerca de nosotros
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="card-title"><b>Misión</b></h2>
                </div>
                <div class="card-body text-justify">
                        <p>
                            Ser un Centro de Investigación que genere soluciones y conocimiento en el área de la informática a través de proyectos de investigación, innovación y transferencia de tecnología, que permitan potenciar el desarrollo tecnológico de informática en El Salvador y Centro América.                        
                        </p>
                    <br/><br/><br/><br/>
                </div>
            </div> 
            <img src="{{ asset('black') }}/img/mision.gif"/>
        </div>
        <div class="col-6">
            <div class="card">
                <br/>
                <div class="icon icon-warning text-center">
                    <img src="{{ asset('black') }}/img/favicon.png" alt="" width="25%">
                </div>
                <div class="card-header text-center">
                    <h2 class="card-title"><b>Centro de Investigación y Desarrollo</b></h2>
                </div>
                <div class="card-body text-justify">
                        <h4>
                            El Centro de Investigación y Desarrollo de Software (CIDES) es el responsable de la gestión de iniciativas de investigación, desarrollo e innovación en el ámbito de la informática de la Escuela de Ingeniería de Sistemas Informáticos (EISI) de la Facultad de Ingeniería y Arquitectura (FIA).
                        </h4>
                        <h4>
                            Los proyectos desarrollados en el CIDES están orientados a la generación y transferencia de tecnología informática, al desarrollo de soluciones a la medida o de propósito general que aporten al mejoramiento de la productividad de entidades públicas y privadas, y la solución de problemáticas que afectan la calidad de vida de la sociedad.
                        </h4>
                    <br/>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="card-title"><b>Visión</b></h2>
                </div>
                <div class="card-body text-justify">
                        <p>
                            Ser un centro de investigación y desarrollo de soluciones informáticas a problemas de la sociedad y las empresas, a través proyectos de investigación e innovación tanto de estudiantes como docentes de la Universidad de El Salvador, que permitan dar paso a la transferencia de nuevas tecnologías con empresas, brindando soluciones creativas, eficientes y eficaces con un fuerte componente de impacto social.                        
                        </p>
                    <br/>
                </div>
            </div> 
            <img src="{{ asset('black') }}/img/vision.gif"/>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>

            <nav class="navF">
                <a href="#">Inicio</a>
                <a href="{{ route('cides') }}">Acerca de</a>
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