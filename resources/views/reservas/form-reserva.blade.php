{!! Form::open(['route' => 'reservas.store', 'role' => 'form']) !!}
<div class="modal fade" id="formularioReserva" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        	<h4 class="modal-title">Formulario de Reserva</h4>
	      	</div>
	      	<div class="modal-body">
	      		@if(Auth::user()->tipo === 'docente')
				@include('reservas.form-reserva-doc')
				@endif
				@if(Auth::user()->tipo === 'autorizado')
				@include('reservas.form-reserva-aut')
				@endif
	      	</div> 	
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        	<button type="submit" class="btn btn-primary">Guardar</button>
	      	</div>
	    </div>
	</div>
</div>
{!! Form::close() !!}