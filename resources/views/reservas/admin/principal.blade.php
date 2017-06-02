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
					<div class="row">
						<div class="col-md-4 col-md-offset-8 text-center">
							<div class="btn-group btn-group-raised">
							  <a href="{{ route('reservas.index') }}" class="btn btn-primary">Inicio</a>
							  <a href="{{ route('reservas.config') }}" class="btn btn-primary">Configuracion</a>
							</div>
						</div>
					</div>
					@yield('contenido-principal-admin')
	            </div>
	            @yield('contenido-principal-admin-offbody')
	            <div class="panel-footer">
	            	@yield('panel-footer')
	            </div>
        	</div>
		</div>
    </div>
</div>
@endsection