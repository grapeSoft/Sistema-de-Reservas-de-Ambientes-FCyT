@extends('plantillas.principal')

@section('contenido')
<div class="row">
	<div class="col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Información General</h4>
			</div>
			<div class="panel-body center-block">
				<div class="text-center">
					@if($usuario->foto !== null)
					<div class="list-group-item">
						<div class="row-picture">
							<img class="img-circle" src="{{ asset('foto-usuario/'.$usuario->foto) }}" alt="Foto Usuario" height="100px" width="100px">
						</div>
					</div>
					@else
					<i class="material-icons md-48 text-primary">face</i>
					@endif
				</div>
				<div class="text-center">
					<!-- <li class="list-group-item list-group-item-success">
						<strong>Nombre</strong>
					</li>
					<li class="list-group-item">{{ $usuario->nombre }}</li>
					<li class="list-group-item list-group-item-success">
						<strong>Apellido paterno</strong>
					</li>
					<li class="list-group-item">{{ $usuario->apellido_paterno }}</li>
					<li class="list-group-item list-group-item-success">
						<strong>Apellido materno</strong>
					</li>
					<li class="list-group-item">{{ $usuario->apellido_materno }}</li> -->
					<li class="list-group-item list-group-item-success">
						<strong>Usuario</strong>
					</li>
					<li class="list-group-item">{{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }} {{ $usuario->nombre }}</li>
					<li class="list-group-item list-group-item-success">
						<i class="material-icons">mail_outline</i>
						<strong>Email</strong>
					</li>
					<li class="list-group-item">{{ $usuario->email }}</li>
					<li class="list-group-item list-group-item-success">
						<strong>Nombre de usuario</strong>
					</li>
					<li class="list-group-item">{{ $usuario->username }}</li>
					<li class="list-group-item list-group-item-success">
						<strong>Tipo de usuario</strong>
					</li>
					<li class="list-group-item">{{ $usuario->tipo }}</li>

				</div>
			</div>	
			<div class="panel-footer text-center">
				<a href="{{ route('usuarios.edit', ['id' => $usuario->id_usuario]) }}" class="btn btn-raised btn-primary">
					<i class="material-icons">autorenew</i>Editar
				</a>
			</div>
		</div>
	</div>
</div>
	
@endsection