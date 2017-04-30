@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Crear Usuario</h4>
			</div>
			<div class="panel-body">
				{!! Form::open([
						'route' => 'usuarios.store', 
						'files' => true,
						'class' => 'form-horizontal'
						]) !!}
					@include('usuarios.form')		
					<div class="text-center">
						<button type="submit" class="btn btn-primary">
							<b class="glyphicon glyphicon-new-window"></b> Crear
						</button>
						{{--<a class="btn btn-primary" --}}
							{{--href="{{ route('usuarios.index') }}">--}}
							{{--<b class="glyphicon glyphicon-remove"></b> Salir--}}
						{{--</a>--}}
					</div>
				{!! Form::close() !!}	
			</div>
		</div>
	</div>
</div>
@endsection