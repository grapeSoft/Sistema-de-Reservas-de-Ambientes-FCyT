@include('usuarios.form-basic')
@if($errors->has('tipo'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('tipo', 'Tipo de usuario', [
			'class' => 'control-label col-md-2'
		]) !!}
		<div class="col-md-10">
			{!! Form::select('tipo',
			config('sistema-reservas.usuarios'),
			null,
			[
			'class' => 'form-control',
			'placeholder' => 'Seleccione un tipo de usuario',
			]) !!}
			<div class="help-block">
				{{ $errors->first('tipo') }}
			</div>
		</div>
	</div>