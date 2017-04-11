@extends('plantillas.principal')

@section('contenido')

<div class="col-md-4 col-md-offset-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Perfil</h4>
		</div>
		<div class="panel-body center-block">
			<div class="text-center">
				@if($usuario->foto !== null)
				<img src="{{ route('usuarios.foto', ['id' => $usuario->id_usuario]) }}">
				@else
				<i class="material-icons">account_circle</i>
				@endif
			</div>
			<ul class="text-center">


				<li class="list-group-item list-group-item-success">
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
				<li class="list-group-item">{{ $usuario->apellido_materno }}</li>
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

			</ul>
		</div>	
		<div class="panel-footer">

			<a href="{{ route('usuarios.edit', ['id' => $usuario->id_usuario]) }}" class="btn btn-raised btn-success">
				<i class="material-icons">autorenew</i>Editar
			</a>
		</div>
	</div>
</div>
@endsection