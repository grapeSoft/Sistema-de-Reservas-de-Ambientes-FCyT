@extends('reservas.admin.principal')

@section('contenido-principal-admin')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Detalle de Reserva</h4>
		</div>
		<div class="panel-body">
			@if(session('mensaje'))
			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{ session('mensaje') }}
			</div>
			@endif

      		@if($usuario->tipo  === 'docente')
			@include('reservas.vista.docente')
			@endif
			@if($usuario->tipo  === 'autorizado')
			@include('reservas.vista.autorizado')
			@endif

		</div>
	</div>
</div>    	
@endsection