@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Registrar docentes</h4>
			</div>
			<div class="panel-body">
					{!! Form::label('foto', 'Archivo', ['class' => 'control-label col-md-2']) !!}
					{!! Form::open(['route' => 'usuarios.registrarUsuarios', 'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
   					{!! Form::file('archivo', ['accept' => '.csv', 'class' => 'form_control']) !!}
   					{!! Form::hidden('MAX_FILE_SIZE', 'Archivo', ['vaule' => '20000', 'accept' => '.cvs', 'class' => 'form_control']) !!}
   					<div class="text-center">
						<button type="submit" name="enviar" value="Importar" class="btn btn-raised">
							<b class="glyphicon glyphicon-pencil"></b> Registrarse
						</button>
					</div>
					{!! Form::close() !!}
			</div>	
		</div>
	</div>
</div>
@endsection