@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Editar Perfil</h4>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="#tab1" data-toggle="tab">Datos Usuario</a></li>
					<li><a href="#tab2" data-toggle="tab">Cambiar Contraseña</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="tab1">
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
							</div>
						{!! Form::close() !!}
					</div>
					<div class="tab-pane fade" id="tab2">
					{!! Form::open(['route' => ['usuarios.updatePassword', $usuario->id_usuario],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}	
						@if($errors->has('password_actual'))
							<div class="form-group has-error">
						@else
							<div class="form-group">
						@endif
							{!! Form::label('password_actual', 'Contraseña actual', ['class' => 'control-label col-md-3']) !!}
							<div class="col-md-8">
								{!! Form::password('password_actual', ['class' => 'form-control']) !!}
								<div class="help-block">
									{{ $errors->first('password_actual') }}
								</div>
							</div>
						</div>
						@if($errors->has('password'))
							<div class="form-group has-error">
						@else
							<div class="form-group">
						@endif
							{!! Form::label('password', 'Contraseña nueva', ['class' => 'control-label col-md-3']) !!}
							<div class="col-md-8">
								{!! Form::password('password', ['class' => 'form-control']) !!}
								<div class="help-block">
									{{ $errors->first('password') }}
								</div>
							</div>
						</div>
						@if($errors->has('password'))
							<div class="form-group has-error">
						@else
							<div class="form-group">
						@endif
							{!! Form::label('password_confirmation', 'Confirmar contraseña nueva', ['class' => 'control-label col-md-3']) !!}
							<div class="col-md-8">
								{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
								<div class="help-block">
									{{ $errors->first('password') }}
								</div>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary">
								<i class="material-icons">done</i> Actualizar
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
						
					
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
@if($errors->has('password') || $errors->has('password_actual'))
	<script type="text/javascript">
		$('.nav-pills > .active').next('li').find('a').trigger('click');
	</script>
@endif       
@endsection