@extends('plantillas.principal')

@section('contenido')
<div class="col-md-6 col-md-offset-3">
	<div class="row">
		<div class="text-center">
			<h1>Bienvenido</h1>
		</div>
	</div>
	<div class="row">
		<img src="{!! asset('img/background.jpg') !!}" class="img-responsive" alt="Imagen responsive">	
	</div>
	<div class="row text-center">
		<p>
			El sistema de Reservas está destinado a automatizar los procesos administrativos de reserva del auditorio de la FCyT  
		</p>
	</div>
</div>
@endsection