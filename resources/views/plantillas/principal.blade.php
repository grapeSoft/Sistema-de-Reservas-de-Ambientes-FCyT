<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, 
          user-scalable=no, 
          initial-scale=1.0, 
          maximum-scale=1.0, 
          minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Reservas</title>
    <!-- Material Design fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <!-- <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-theme.min.css') !!}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{!! asset('css/aplicacion.css') !!}"> -->
    <!-- Bootstrap Material Design -->
  	<link href="{!! asset('css/bootstrap-material-design.css') !!}" rel="stylesheet">
  	<link href="{!! asset('css/ripples.min.css') !!}" rel="stylesheet">
  	
  	<div class="page-header">
	<h1>Sistema de Reservas</h1>
	</div>	
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" 
					class="navbar-toggle collapsed" 
					data-toggle="collapse" 
					data-target="#bs-navbar-collapse-1" 
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistema de Reservas</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
					<li><a href="{{ route('usuarios.login') }}">Iniciar sesión</a></li>
					@else
					<li class="dropdown">
						<a href="#" 
							class="dropdown-toggle" 
							data-toggle="dropdown" 
							role="button" 
							aria-haspopup="true" 
							aria-expanded="false">
							<b class="glyphicon glyphicon-user"></b>
							{{ Auth::user()->username }}&nbsp;
							<span class="caret"></span>
						</a>
			          	<ul class="dropdown-menu">
			          		<li>
			            		<a href="{{ route('usuarios.perfil') }}">
			            			Perfil
			            		</a>
			            	</li>
			          		@if(Auth::user()->tipo === 'administrador')
			          		@include('plantillas.menu-adm')
			          		@elseif(Auth::user()->tipo === 'autorizado')
			          		@include('plantillas.menu-aut')
			          		@elseif((Auth::user()->tipo === 'docente'))
			          		@include('plantillas.menu-est')
			          		@endif
			            	<li>
			            		<a href="{{ route('usuarios.logout') }}">
			            			Cerrar sesión
			            		</a>
			            	</li>
			          	</ul>
			        </li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<article id="contenido">
		<div class="container-fluid">
		@yield('contenido')		
		</div>
	</article>

	<footer class="text-center" id="pie">
		<div class="container-fluid">
			<h4>Sistema de Reservas para la FCyT - UMSS</h4>
			<h5>2017</h5>
		</div>
	</footer>

	<script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
	<!-- Material Design for Bootstrap -->
	<script src="{!! asset('js/material.min.js') !!}"></script>
	<script src="{!! asset('js/ripples.min.js') !!}"></script>
	<script>
  	$.material.init();
	</script>
</body>
</html>