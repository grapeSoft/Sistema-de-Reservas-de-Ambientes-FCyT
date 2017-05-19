@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Editar Usuario</h4>
			</div>
			<div class="panel-body">
				{!! Form::model($usuario, [
					'route' => ['usuarios.update', $usuario->id_usuario],
					'method' => 'put',
					'files' => true,
					'class' => 'form-horizontal'
					]) !!}
					@if(Auth::user()->tipo === 'administrador')
					@include('usuarios.form-edit')
					@endif
					@if(Auth::user()->tipo === 'autorizado' || Auth::user()->tipo === 'docente')
					@include('usuarios.form-edit-perfil')
					@endif
					<div class="text-center">
						<button type="submit" class="btn btn-primary">
							<i class="material-icons">done</i> Actualizar
						</button>
						<a class="btn btn-primary" 
							href="{{ back()->getTargetUrl() }}">
							<i class="material-icons">close</i> Salir
						</a>
					</div>
					
			</div>
		</div>
	</div>
</div>
@endsection