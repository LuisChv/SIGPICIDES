@extends('errors::minimal')

@section('title', __('Acceso denegado'))
@section('code', '')
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('black') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('black') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('black') }}/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('black') }}/css/theme.css" rel="stylesheet" />
        <!--menu-Flotante-->
        <link href="{{ asset('black') }}/css/menu_flotante.css" rel="stylesheet" />

        
    </head>
<style>
	#fakebg{
		width: 100% !important;
		height: 100% !important;
		background-color: #04043C;
	}
	::-webkit-scrollbar {
	    display: none;
	}
	#fondo{
		position:absolute !important; 
		z-index:1 !important; 
		width:100% !important;
	}
</style>

@can('validacion')
	<div id="fakebg">		
		<img id="fondo" src="/black/img/403.png">
	</div>
@else
	<br>
	<body class="{{ $class ?? '' }} white-content" >
			
			<div class="content">
				<div class="row">
					<div class="col-4">
					</div>
						
					<div class="col-4">
						<div class="card">
							
							<div class="icon icon-warning text-center">
								<br><br><img src="{{ asset('black') }}/img/favicon.png" alt="" width="25%"><br><br>
							</div>
							<div class="card-header text-center">
								<h3>Se ha enviado un mensaje a su correo electrónico para confirmar su cuenta.</h3>
							</div>
							<div class="card-body text-center">
								<h4>Si no recibio el correo presione el boton para reenviarlo.</h4>

								<div class="row">
									<div class="col-6">
										<a href="{{url('resend/verify')}}" type="button" class="btn btn-primary">Enviar correo</a>
									</div>
									<div class="col-6">
										<a href="{{ route('logout') }}" type="button" class="btn btn-warning" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								</div>
							</div>
							<br>
						</div>
					</div>
					<div class="col-4">
					</div>
				</div>
			</div>
		</body>

@endcan

	<script src="{{ asset('js/app.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('black') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('black') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('black') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('black') }}/js/black-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('black') }}/js/theme.js"></script>
