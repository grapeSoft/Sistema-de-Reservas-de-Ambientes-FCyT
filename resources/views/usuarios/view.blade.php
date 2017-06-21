@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Detalle de usuario</h4>
			</div>
			<div class="panel-body">
				@if(session('mensaje'))
				<div class="alert alert-success">
					{{ session('mensaje') }}
				</div>
				@endif
				<table class="table table-bordered table-hover">
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
					<!-- <a href="{{ route('usuarios.edit', ['id' => $usuario->id_usuario]) }}" 
						class="btn btn-success">
						<i class="material-icons">mode_edit</i> Editar
					</a>
					{!! Form::open([
						'route' => ['usuarios.destroy', $usuario->id_usuario],
						'method' => 'delete',
						'class' => 'form-eliminar',
						]) !!}
						<button class="btn btn-danger">
							<i class="material-icons">delete</i> Eliminar
						</button>
					{!! Form::close() !!} -->
					<a href="{{ back()->getTargetUrl() }}"
						class="btn btn-primary">
						<i class="material-icons">close</i> Salir
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection