@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Reservas</h4>
		</div>
		<div class="panel-body">
			<div class="hidden-xs text-right col-md-12">
				<div class="btn-group btn-group-raised">
					<a href="{{ route('reservas.index') }}" class="btn btn-primary">Mis Reservas</a>
					<a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
				</div>						
			</div>
			<div class="visible-xs btn-group-vertical btn-group-raised">
				<a href="{{ route('reservas.index') }}" class="btn btn-primary">Mis Reservas</a>
				<a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
			</div>
			@yield('contenido-principal')
		</div>
		@yield('contenido-principal-offbody')
	</div>
</div>
@endsection