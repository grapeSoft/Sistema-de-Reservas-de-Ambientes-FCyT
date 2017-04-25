<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Reservas</title>
    <!-- Material Design fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
	<!-- Material Design icons -->
	<link href="{!! asset('css/material-iconfont.css') !!}" rel="stylesheet">
	<!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <!-- <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-theme.min.css') !!}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{!! asset('css/aplicacion.css') !!}"> -->
    <!-- Bootstrap Material Design -->
  	<link href="{!! asset('css/bootstrap-material-design.css') !!}" rel="stylesheet">
  	@unless(Auth::check())
  	<link href="{!! asset('css/style.css') !!}" rel="stylesheet">
  	@endunless
  	<link href="{!! asset('css/materialStyle.css') !!}" rel="stylesheet">
</head>
<body>
	@if(Auth::check())
	@include('plantillas.cabecera')	
		@if(Auth::user()->tipo === 'administrador')
		@include('plantillas.menu-adm')
		@elseif(Auth::user()->tipo === 'autorizado')
		@include('plantillas.menu-aut')
		@elseif((Auth::user()->tipo === 'docente'))
		@include('plantillas.menu-doc')
		@endif
	@endif
	<article id="contenido">
		<!-- <div class="container"> -->
		@yield('contenido')		
		<!-- </div> -->
	</article>
	@if(Auth::check())
	@include('plantillas.pie')	
	@endif
	<script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
	<!-- Material Design for Bootstrap -->
	<script src="{!! asset('js/material.min.js') !!}"></script>
	<script src="{!! asset('js/ripples.min.js') !!}"></script>
	<!-- Material init -->
	<script>
  	$.material.init();
	</script>
</body>
</html>