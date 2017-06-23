@extends('plantillas.principal')

@section('contenido')
<div class="container-fluid">
	<div class="row">
		<!--<div class="col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-2">-->	
		<div class="col-md-9">
			<div class="panel panel-default" style="padding-bottom: 30px;margin-bottom: 0px;">
				<div class="panel-body" style="padding-top: 0px;">					
					<div class="row">
						<div class="col-sm-6 col-md-8">
							<div class="text-center" style="padding-bottom: 10px;">
								<h1>Bienvenido</h1>
							</div>
							<img src="{!! asset('img/background2.jpg') !!}" class="img-responsive center-block" alt="Imagen responsive" style = "max-width:94%;">	
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="" style="padding-top: 75px;">
								<p>
									El sistema de Reservas está destinado a automatizar los procesos administrativos de reserva del auditorio de la FCyT  
								</p>
								<p>
									Este sistema esta destina a Docentes y usuarios autorizados para realizar la reserva del auditorio.
								</p>
								<p>
									El tipo de información que se presenta es calendario, horarios y detalle de las reservas que se realicen. 
								</p>
							</div>
						</div>
					</div>						
				</div>
			</div>	
		</div>
		<div class="col-md-3">
			@include('principal.perfil')
		</div>	
	</div>
</div>
@endsection