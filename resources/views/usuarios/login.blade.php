@extends('plantillas.principal')
@section('contenido')
<div class="container">
	<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h4>Iniciar sesión</h4>
			</div>
			<div class="panel-body">
				@if(session('mensaje'))
				<div class="alert alert-success">
					{{ session('mensaje') }}
				</div>
				@endif

				@if($errors->has('login'))
				<div class="alert alert-danger">
					{{ $errors->first('login') }}
				</div>
				@endif
				{!! Form::open(['route' => 'usuarios.logear']) !!}
					<div class="form-group">
						<!-- {!! Form::label('username', 'Nombre de usuario', ['class' => 'control-label']) !!} -->
						{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Nombre de usuario']) !!}
					</div>
					<div class="form-group">
						<!-- {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!} -->
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Ingresar</button>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="panel-footer text-center">
				<h5>Sistema de Reservas para la FCyT - UMSS</h5>
				<h6>Copyright &copy;2017</h6>
			</div>
		</div>
	</div>
</div>
@endsection