@extends('plantillas.principal')

@section('contenido')

<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Detalle de Reserva</h4>
			</div>
			<div class="panel-body">
				@if(session('mensaje'))
				<div class="alert alert-success">
					{{ session('mensaje') }}
				</div>
				@endif


	      		@if(Auth::user()->tipo === 'docente')
				@include('reservas.vista.docente')
				@endif
				@if(Auth::user()->tipo === 'autorizado')
				@include('reservas.vista.autorizado')
				@endif

				
			</div>
		</div>
	</div>
</div>
	      	

@endsection