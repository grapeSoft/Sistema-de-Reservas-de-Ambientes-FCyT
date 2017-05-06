<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Formulario de Reserva</h4>
</div>
<div class="modal-body">
	<div class="">
		<div class="col-md-12">
			<div class="form-group" style="margin-top: 0;">
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
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<div class="col-md-12">
					{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción...', 'rows' => '3']) !!}
					<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realices.</span>
				</div>
			</div>
		</div>
	</div>
</div> 	
