@extends('plantillas.principal')

@section('contenido')
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>Perfil</h4>
		</div>
		<div class="panel-body">
			<div class="text-center">
				@if($usuario->foto !== null)
				<img src="{{ route('usuarios.foto', ['id' => $usuario->id_usuario]) }}">
				@else
				<b class="glyphicon glyphicon-user user-icon"></b>
				@endif
			</div>
			<ul class="list-group text-center">
				<li class="list-group-item active">
					<strong>Nombre</strong>
				</li>
				<li class="list-group-item">{{ $usuario->nombre }}</li>
				<li class="list-group-item active">
					<strong>Apellido paterno</strong>
				</li>
				<li class="list-group-item">{{ $usuario->apellido_paterno }}</li>
				<li class="list-group-item active">
					<strong>Apellido materno</strong>
				</li>
				<li class="list-group-item">{{ $usuario->apellido_materno }}</li>
				<li class="list-group-item active">
					<strong>Email</strong>
				</li>
				<li class="list-group-item">{{ $usuario->email }}</li>
				<li class="list-group-item active">
					<strong>Nombre de usuario</strong>
				</li>
				<li class="list-group-item">{{ $usuario->username }}</li>
				<li class="list-group-item active">
					<strong>Tipo de usuario</strong>
				</li>
				<li class="list-group-item">{{ $usuario->tipo }}</li>
			</ul>
		</div>
	</div>
</div>
@endsection