@extends('plantillas.principal')

@section('contenido')
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>Detalle de usuario</h4>
		</div>
		<div class="panel-body">
			@if(session('mensaje'))
			<div class="alert alert-success">
				{{ session('mensaje') }}
			</div>
			@endif
			<table class="table table-bordered">
				<tr>
					<td><strong>Id. de Usuario</strong></td>
					<td>{{ $usuario->id_usuario }}</td>
				</tr>
				<tr>
					<td><strong>Nombre</strong></td>
					<td>{{ $usuario->nombre }}</td>
				</tr>
				<tr>
					<td><strong>Apellido Paterno</strong></td>
					<td>{{ $usuario->apellido_paterno}}</td>
				</tr>
				<tr>
					<td><strong>Apellido Materno</strong></td>
					<td>{{ $usuario->apellido_materno }}</td>
				</tr>
				<tr>
					<td><strong>Email</strong></td>
					<td>{{ $usuario->email }}</td>
				</tr>
				<tr>
					<td><strong>Nombre de usuario</strong></td>
					<td>{{ $usuario->username }}</td>
				</tr>
				<tr>
					<td><strong>Tipo de usuario</strong></td>
					<td>{{ $usuario->tipo }}</td>
				</tr>
			</table>
			<div class="text-center">
				<a href="{{ route('usuarios.edit', ['id' => $usuario->id_usuario]) }}" 
					class="btn btn-success">
					<b class="glyphicon glyphicon-edit"></b> Editar
				</a>
				{!! Form::open([
					'route' => ['usuarios.destroy', $usuario->id_usuario],
					'method' => 'delete',
					'class' => 'form-eliminar',
					]) !!}
					<button class="btn btn-danger">
						<b class="glyphicon glyphicon-trash"></b> Eliminar
					</button>
				{!! Form::close() !!}
				<a href="{{ route('usuarios.index') }}" 
					class="btn btn-primary">
					<b class="glyphicon glyphicon-remove"></b> Salir
				</a>
			</div>
		</div>
	</div>
</div>
@endsection