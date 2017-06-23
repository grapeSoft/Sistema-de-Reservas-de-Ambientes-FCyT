@extends('plantillas.principal')
@section('contenido')
<div class="hidden-xs" style="padding-bottom: 100px;">
</div>
<div class="container">
	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h3>Sistema de Reservas <small style="color: #fff;">FCyT - UMSS</small></h3> 
			</div>
			<div class="panel-body">
				<h2 class="text-center">Iniciar Sesión</h2>
				@if(session('mensaje'))
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ session('mensaje') }}
				</div>
				@endif
				@if($errors->has('login'))
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					{{ $errors->first('login') }}
				</div>
				@endif
				{!! Form::open(['route' => 'usuarios.logear']) !!}
					<div class="form-group label-floating">
						{!! Form::label('username', 'Nombre de usuario', ['class' => 'control-label']) !!}
						{!! Form::text('username', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group label-floating">
						{!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>
					<div>
						<a href="{{ route('usuarios.recuperarC') }}" class="label-link"> Olvidaste tu contraseña? </a>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-raised">Ingresar</button>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="panel-footer text-center">
				<h5>Copyright &copy;2017 
				<a href="mailto:grapesoftbolivia@gmail.com" class="label-link"> GrapeSoft. </a>
				Todos los derechos reservados</h5>
			</div>
		</div>
	</div>
</div>
@endsection