@extends('plantillas.principal')

@section('contenido')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Editar Usuario</h4>
		</div>
		<div class="panel-body">
			{!! Form::model($usuario, [
				'route' => ['usuarios.update', $usuario->id_usuario],
				'method' => 'put',
				'files' => true,
				]) !!}
				@if(Auth::user()->tipo === 'administrador')
				@include('usuarios.form-edit')
				@endif
				@if(Auth::user()->tipo === 'autorizado')
				@include('usuarios.form-edit-perfil')
				@endif
				<div class="text-center">
					<button type="submit" class="btn btn-primary">
						<b class="glyphicon glyphicon-edit"></b> Actualizar
					</button>
					<a class="btn btn-primary" 
						href="{{ route('usuarios.index') }}">
						<b class="glyphicon glyphicon-remove"></b> Salir
					</a>
				</div>
			{!! Form::close() !!}	
		</div>
	</div>
</div>
@endsection