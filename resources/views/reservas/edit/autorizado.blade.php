<legend>Formulario de Reserva</legend>
<fieldset>
	<div class="form-group" style="margin-top: 1;">
		{!! Form::label('tipo', 'Tipo de Reservas', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-8">
			{!! Form::select('tipo', [
			'Congreso' => 'Congreso', 
			'Seminario'=> 'Seminario', 
			'Cursos' => 'Cursos', 
			'Charlas' => 'Charlas', 
			'otros' => 'Otros',], null, ['class' => 'form-control'])!!}
		</div> 
	</div>
	<div class="form-group">
		{!! Form::label('descripcion', 'Descripción', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-8">
			{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
			<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realices.</span>
		</div>
	</div>