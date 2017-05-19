<div class="modal fade" id="formularioDocente" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Registrar docentes</h4>
			</div>
			<div class="modal-body">
			{!! Form::open(['route' => 'usuarios.registrarUsuarios', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
				<div class="form-group">
					{!! Form::label('archivo', 'Archivo', ['class' => 'control-label col-md-2']) !!}
					<div class="col-md-10">
						{!! Form::text(null, null, ['class' => 'form-control', 'placeholder' => 'Subir un archivo .csv ...', 'readonly' => '']) !!}
						{!! Form::file('archivo', ['accept' => '.csv', 'class' => 'form_control']) !!}
						{!! Form::hidden('MAX_FILE_SIZE', 'Archivo', ['vaule' => '20000', 'accept' => '.cvs', 'class' => 'form_control']) !!}
					</div>
				</div>	
			</div> 	
	      	<div class="modal-footer">
	        	<div class="form-group">
	        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        	<button type="submit" class="btn btn-primary">Registrar</button>
		        </div>
	      	</div>
	      	{!! Form::close() !!}
	    </div>
	</div>
</div>