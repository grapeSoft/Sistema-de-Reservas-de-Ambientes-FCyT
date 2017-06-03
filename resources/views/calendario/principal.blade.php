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
						<div class="col-md-5 col-md-offset-7 text-center">
							<div class="btn-group btn-group-raised">
							  	<a href="{{ route('calendario.index') }}" class="btn btn-primary">Inicio</a>
							  	<a href="{{ route('calendario.feriado') }}" class="btn btn-primary">Feriado</a>
							  	<a href="{{ route('calendario.config') }}" class="btn btn-primary">Configuracion</a>
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