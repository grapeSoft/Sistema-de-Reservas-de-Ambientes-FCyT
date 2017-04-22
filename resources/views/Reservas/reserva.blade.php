@extends('plantillas.principal')

@section('contenido')
<div class="container">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary">
			<!-- <div class="panel-heading">
				<h4>Mis reservas</h4>
			</div> -->

			<div class="bs-component">
          	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
            	<li class="active"><a href="#misReservas" data-toggle="tab"><strong>Mis reservas</strong></a></li>
            	<li><a href="#todasLasReservas" data-toggle="tab"><strong>Todas las reservas</strong></a></li>
          	</ul>
          	<div id="myTabContent" class="tab-content">
            	<div class="tab-pane fade active in" id="misReservas">
		            <div class="panel-body">
						<!--@if(session('mensaje'))
						<div class="alert alert-danger">
							{{ session('mensaje') }}
						</div>
						@endif
						<div>
							<a href="{{ route('usuarios.create') }}" class="btn btn-primary">
								<i class="material-icons">person_add</i> Crear usuario
							</a>	
						</div> -->
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
								@foreach($reservas as $reserva)
									<tr>
										<!-- <td>{{ $reserva->materia }}</td>
										<td>{{ $reserva->titulo }}</td> -->
										<td>{{ $reserva->fecha }}</td>
										<td>{{ $reserva->horaIni }}</td>
										<td>{{ $reserva->horaFin }}</td>
										<td>
											<a href="#" 
											class="btn btn-xs btn-info" title="Ver">
												<i class="material-icons md-18">open_in_new</i>
											</a>
										</td>
										<td>
											<a href="#" 
												class="btn btn-xs btn-success" title="Editar">
												<i class="material-icons md-18">mode_edit</i>
											</a>
										</td>
										<td>
											<a href="#" 
											class="btn btn-xs btn-danger" title="Eliminar">
												<i class="material-icons md-18">delete</i>
											</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>	
					</div>	
	            </div>
	            <div class="tab-pane fade" id="todasLasReservas">
	             	<div class="panel-body">
						<!--@if(session('mensaje'))
						<div class="alert alert-danger">
							{{ session('mensaje') }}
						</div>
						@endif
						<div>
							<a href="{{ route('usuarios.create') }}" class="btn btn-primary">
								<i class="material-icons">person_add</i> Crear usuario
							</a>	
						</div> -->
						<div class="">
							<table class="table table-striped table-hover table-bordered table-responsive">
								<thead>
									<tr class="success">
										<!-- <th>Materia</th> -->
										<th>Reservado por:</th>
										<th>Fecha</th>
										<th>Hora inicio</th>
										<th>Hora fin</th>
										<th class="text-center">Opciones</th>
									</tr>
								</thead>
								<tbody>
								@foreach($todasLasReservas as $reserva)
									<tr>
										<!-- <td>{{ $reserva->materia }}</td>
										<td>{{ $reserva->titulo }}</td> -->
										<td></td>
										<td>{{ $reserva->fecha }}</td>
										<td>{{ $reserva->horaIni }}</td>
										<td>{{ $reserva->horaFin }}</td>
										<td class="text-center">
											<a href="#" 
											class="btn btn-xs btn-info" title="Ver">
												<i class="material-icons md-18">open_in_new</i>
											</a>
										</td>
										<!-- <td>
											<a href="#" 
												class="btn btn-xs btn-success" title="Editar">
												<i class="material-icons md-18">mode_edit</i>
											</a>
										</td>
										<td>
											<a href="#" 
											class="btn btn-xs btn-danger" title="Eliminar">
												<i class="material-icons md-18">delete</i>
											</a>
										</td> -->
									</tr>
								@endforeach
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