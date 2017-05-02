<div class="row">
	<div class="form-group" style="margin-top: 0;">
		{!! Form::label('tipo', 'Tipo de Reservas', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-10 col-md-offset-1">
			{!! Form::select('tipo', [
			'Congreso' => 'Congreso', 
			'Seminario'=> 'Seminario', 
			'Cursos' => 'Cursos', 
			'Charlas' => 'Charlas', 
			'otros' => 'Otros',], null, ['class' => 'form-control'])!!}
		</div> 
	</div>
</div>
<div class="row">
	<div class="form-group">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción...', 'rows' => '3']) !!}
			<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realices.</span>
		</div>
	</div>
</div>