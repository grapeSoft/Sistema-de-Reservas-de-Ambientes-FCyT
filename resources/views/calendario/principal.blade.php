@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Calendario</h4>
			</div>
			<div class="bs-component">
		        <div class="panel-body">
					<div class="row">
						<div class="col-md-4 col-md-offset-8 text-center">
							<div class="btn-group btn-group-raised">
							  	<a href="{{ route('calendario.index') }}" class="btn btn-primary">Inicio</a>
							  	<a href="#" class="btn btn-primary">Configuracion</a>
							</div>
						</div>
					</div>
					@yield('contenido-principal-calendario')
	            </div>
	            @yield('contenido-principal-calendario-offbody')
        	</div>
		</div>
    </div>
</div>
@endsection