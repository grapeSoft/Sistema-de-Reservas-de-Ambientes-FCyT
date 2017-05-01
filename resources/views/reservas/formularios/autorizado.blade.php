<div class="row">
	<div class="form-group" style="margin-top: 0;">
		{!! Form::label('tipo', 'Tipo de Reservas', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-12">
			{!! Form::select('tipo', ['Congreso', 'Seminario', 'Cursos', 'Charlas', 'otros'], null, ['class' => 'form-control'])!!}
		</div> 
	</div>
</div>
<div class="row">
	<div class="form-group">
		<div class="col-md-12">
			{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción...', 'rows' => '3']) !!}
			<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realices.</span>
		</div>
	</div>
</div>