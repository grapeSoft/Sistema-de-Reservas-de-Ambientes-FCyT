@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Lista de usuarios</h4>
			</div>
			<div class="panel-body">
				@if(session('mensaje'))
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ session('mensaje') }}
				</div>
				@endif
				<div class="row">
					<div class="col-md-3 text-center">
						<a href="{{ route('usuarios.create') }}" class="btn btn-primary">
							<i class="material-icons">person_add</i> Crear usuario
						</a>	
					</div>
					<div class="col-md-3 col-md-offset-5 text-center">
		                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formularioDocente"><i class="material-icons">supervisor_account</i> Registrar docentes UMSS</button>
		            </div>
		       		@include('usuarios.docentes.registrar')
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th class="text-center">Nombre</th>
								<!--<th class="text-center">Nombre de usuario</th>-->
								<th class="text-center">Email</th>
								<th class="text-center">Tipo</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>
						<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->apellido_paterno}} {{$usuario->apellido_materno}} {{$usuario->nombre}}</td>
								<!--<td>{{ $usuario->username }}</td>-->
								<td class="text-center">{{ $usuario->email }}</td>
								<td class="text-center">{{ $usuario->tipo }}</td>
								<td>
									<div class="text-center">
										<a href="{{ route('usuarios.show', ['id' => $usuario->id_usuario]) }}" class="btn btn-fab btn-fab-mini btn-info" title="Ver"> 
											<i class="material-icons md-18">open_in_new</i>
										</a>
										<a href="{{ route('usuarios.edit', ['id' => $usuario->id_usuario]) }}" class="btn btn-fab btn-fab-mini btn-success" title="Editar">
											<i class="material-icons md-18">mode_edit</i>
										</a>
										<a href="" data-target="#form-delete-{{$usuario->id_usuario}}" data-toggle="modal" class="btn btn-fab btn-fab-mini btn-danger" title="Eliminar">
											<i class="material-icons md-18">delete</i>
										</a>	
									</div>	
								</td>
							</tr>
						@include('usuarios.delete.form-delete')
						@endforeach
						</tbody>						
					</table>
					{{$usuarios->render()}}
				</div>	
			</div>	
		</div>
	</div>
</div>
@endsection