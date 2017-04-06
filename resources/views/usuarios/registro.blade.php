@extends('plantillas.principal')

@section('contenido')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Registrarse</h4>
		</div>
		<div class="panel-body">
		{!! Form::open(['route' => 
			'usuarios.registrar', 
			'files' => true]) !!}
		@include('usuarios.form-basic')
		<div class="text-center">
			<button type="submit" class="btn btn-primary">
				<b class="glyphicon glyphicon-pencil"></b> Registrarse
			</button>
		</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection