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
		        	<div class="col-md-4 col-md-offset-8">
		        		<ul class="nav nav-tabs" style="margin-bottom: 15px;">
            	<li class="active"><a href="#misReservas" data-toggle="tab"><strong>Mis reservas</strong></a></li>
            	<li><a href="#todasLasReservas" data-toggle="tab"><strong>Reservar</strong></a></li>
          	</ul>
		        	</div>
		            <div id="myTabContent" class="tab-content col-md-12">
			            <div class="tab-pane fade active in" id="misReservas">
							
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr class="success">
											<!-- <th>Materia</th>
											<th>Evento</th> -->
											<th>Fecha</th>
											<th>Hora inicio</th>
											<th>Hora fin</th>
											<th></th>
											<th>Opciones</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</div>	
						</div>	
		            
		            	<div class="tab-pane fade" id="todasLasReservas">
							<div class="">
								<table class="table table-striped table-hover table-bordered table-responsive">
									<thead>
										<tr class="success">
											<th>Reservado por:</th>
											<th>Fecha</th>
											<th>Hora inicio</th>
											<th>Hora fin</th>
											<th class="text-center">Opciones</th>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</div>	
						</div>	
					</div>
	            </div>
            
        </div>
			
		</div>
    </div>
</div>
@endsection