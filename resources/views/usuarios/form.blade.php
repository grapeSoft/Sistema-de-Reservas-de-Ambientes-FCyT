@include('usuarios.form-basic')
<div class="form-group">
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
	</div>
</div>