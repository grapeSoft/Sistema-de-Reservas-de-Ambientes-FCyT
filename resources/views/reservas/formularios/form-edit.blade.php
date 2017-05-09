<div class="">
	<div class="modal fade" id="form-edit-{{$reserva->id_reserva}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
		    <div class="modal-content">
	      		@if(Auth::user()->tipo === 'docente')
				@include('reservas.formularios.docente')
				@endif
				@if(Auth::user()->tipo === 'autorizado')
				@include('reservas.formularios.autorizado')
				@endif	
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		      	</div>
		    </div>
		</div>
	</div>
</div>
{!! Form::close() !!}