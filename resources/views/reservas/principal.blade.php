@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Reservas</h4>
			</div>
			<div class="bs-component">
		        <div class="panel-body">
					@if(auth()->user()->esAdministrador())
						<a href="{{ route('reservas.config') }}" class="btn btn-primary">Configurar Reservas</a>
					@endif
					<div class="col-md-5 col-md-offset-7">
						<div class="btn-group btn-group-justified btn-group-raised">
						  <a href="{{ route('reservas.index') }}" class="btn btn-primary">Mis Reservas</a>
						  <a href="{{ route('reservas.create') }}" class="btn btn-primary">Crear Reserva</a>
						</div>
					</div>
					@yield('contenido-principal')
	            </div>
	            @yield('contenido-principal-offbody')
	            <div class="panel-footer">
	            	@yield('panel-footer')
	            </div>
        	</div>
		</div>
    </div>
</div>
@endsection