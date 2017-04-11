@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Lista de usuarios</h4>
			</div>
			<div class="panel-body">
				@if(session('mensaje'))
				<div class="alert alert-danger">
					{{ session('mensaje') }}
				</div>
				@endif
				<div>
					<a href="{{ route('usuarios.create') }}" class="btn btn-primary">
						<i class="material-icons">person_add</i> Crear usuario
					</a>	
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Nombre de usuario</th>
								<th>Email</th>
								<th>Tipo</th>
								<th></th>
								<th>Opciones</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{ $usuario->nombre }}</td>
								<td>{{ $usuario->username }}</td>
								<td>{{ $usuario->email }}</td>
								<td>{{ $usuario->tipo }}</td>
								<td>
									<a href="{{ route('usuarios.show', 
										['id' => $usuario->id_usuario]) }}" 
									class="btn btn-xs btn-info" title="Ver">
										<i class="material-icons md-18">open_in_new</i>
									</a>
								</td>
								<td>
									<a href="{{ route('usuarios.edit', 
										['id' => $usuario->id_usuario]) }}" 
										class="btn btn-xs btn-success" title="Editar">
										<i class="material-icons md-18">mode_edit</i>
									</a>
								</td>
								<td>
									{!! Form::open(['route' => 
											['usuarios.destroy', $usuario->id_usuario],
									 	'method' => 'delete', 
									 	'class' => 'form-eliminar']) !!}
										<button type="submit" class="btn btn-xs btn-danger" title="Eliminar">
											<i class="material-icons md-18">delete</i>
										</button>
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>	
			</div>	
		</div>
	</div>
</div>
@endsection