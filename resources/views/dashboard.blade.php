@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('title')
    Próximamente
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title"><b></b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body text-center">
                        <div class="icon icon-warning">
                            <img src="{{ asset('black') }}/img/favicon.png" alt="" width="25%">
                        </div>
                        <p style="font-size:800%;"><b>Próximamente!!!</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>
            <nav class="navF">
                <a href="#">Inicio</a>
                <a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a>
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