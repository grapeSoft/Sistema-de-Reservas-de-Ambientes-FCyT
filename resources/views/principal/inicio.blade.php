@extends('plantillas.principal')

@section('contenido')
<div class="col-md-6 col-md-offset-3">
	<h1>Bienvenido</h1>
	<div class="text-center">
		<img src="{!! asset('img/img01.png') !!}">	
	</div>
	<p>
		<strong>VAcad</strong> es una plataforma virtual para la enseñanza
		y el aprendizaje, de diversos temas de cualquier área del conocimiento,
		brindando herramientas digitales para mejorar este proceso.
	</p>
</div>
@endsection