@include('usuarios.form-basic')
<div class="form-group">
	{!! Form::label('tipo', 'Tipo de usuario', [
		'class' => 'control-label'
	]) !!}
	{!! Form::select('tipo', 
		config('sistema-reservas.usuarios'),
		null,
		[
		'class' => 'form-control',
		'placeholder' => 'Seleccione un tipo de usuario',
		]) !!}
</div>