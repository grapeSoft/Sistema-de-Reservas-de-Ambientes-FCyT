@extends('plantillas.principal')
@section('contenido')
	<div class="container">
		<div class="col-md-10">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioReserva">Siguiente</button>
		</div>
	</div>
	@include('reservas.form-reserva')	
@endsection