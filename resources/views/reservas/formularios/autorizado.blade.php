<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Formulario de Reserva</h4>
</div>
<div class="modal-body">
	<div class="">
		@foreach ($errors->all() as $error)
		<p class="alert alert-danger">{{ $error }}</p>
		@endforeach
		<div class="col-md-12">
			<div class="form-group" style="margin-top: 0;">
				{!! Form::label('tipo', 'Tipo de Reserva', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::select('tipo', config('sistema-reservas.eventos'), null, ['class' => 'form-control'])!!}
				</div> 
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				{!! Form::label('descripcion', 'Descripción', ['class' => 'control-label col-md-2']) !!}
				<div class="col-md-10">
					{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción...', 'rows' => '3']) !!}
					<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realice.</span>
				</div>
			</div>
		</div>
	</div>
</div> 	