<legend>Formulario de Reserva</legend>
<fieldset>
	@if($errors->has('descripcion'))
		<p class="alert alert-danger">{{ $errors->first('descripcion') }}</p>
	@endif
	<div class="form-group" style="margin-top: 1;">
		{!! Form::label('tipo', 'Tipo de Reserva', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-8">
			{!! Form::select('tipo', config('sistema-reservas.eventos'), null, ['class' => 'form-control'])!!}
		</div> 
	</div>
	<div class="form-group">
		{!! Form::label('descripcion', 'Descripción', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-8">
			{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
			<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realice.</span>
		</div>
	</div>