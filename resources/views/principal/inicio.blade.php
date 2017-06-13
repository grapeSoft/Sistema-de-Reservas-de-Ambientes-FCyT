@extends('plantillas.principal')

@section('contenido')
<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-2">
				<div class="text-center">
					<h1>Bienvenido</h1>
				</div>
				<div class="">
					<img src="{!! asset('img/background.jpg') !!}" class="img-responsive center-block" alt="Imagen responsive" style = "max-width:90%;">	
				</div>
				<div class="text-center">
					<p>
						El sistema de Reservas está destinado a automatizar los procesos administrativos de reserva del auditorio de la FCyT  
					</p>
				</div>
			</div>
			<div class="col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-2">
				@include('principal.perfil')
			</div>	
		</div>
</div>
@endsection