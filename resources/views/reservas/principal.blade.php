@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Reservas</h4>
			</div>
			<div class="bs-component">
		        <div class="panel-body">
					<div class="col-md-4 col-md-offset-8 text-center">
						<div class="hidden-xs btn-group btn-group-raised">
						  <a href="{{ route('reservas.index') }}" class="btn btn-primary">Mis Reservas</a>
						  <a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
						</div>
						<div class="visible-xs btn-group-vertical btn-group-raised">
						  <a href="{{ route('reservas.index') }}" class="btn btn-primary">Mis Reservas</a>
						  <a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
						</div>
					</div>
					@yield('contenido-principal')
	            </div>
	            @yield('contenido-principal-offbody')
        	</div>
		</div>
    </div>
</div>
@endsection