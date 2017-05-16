@extends('reservas.principal')

@section('contenido-principal-offbody')						
<div class="panel-body">
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<!-- <th>Materia</th>
					<th>Evento</th> -->
					<th>Fecha</th>
					<th>Hora inicio</th>
					<th>Hora fin</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($reservas as $reserva)
				<tr>
					<td>{{ $reserva->horarios->first()->pivot->id_fecha }}</td>
					<td>{{ $reserva->horarios->first()->hora_inicio }}</td>
					<td>{{ $reserva->horarios->last()->hora_fin }}</td>
					<td>
						<div class="text-center">
							<a href="{{ route('reservas.show',['id' => $reserva->id_reserva]) }}" class="btn btn-fab btn-fab-mini btn-info" >
								<i class="material-icons md-18">open_in_new</i>
							</a>
							<a href="{{ route('reservas.edit',['id' => $reserva->id_reserva]) }}" class="btn btn-fab btn-fab-mini btn-success" title="Editar">
								<i class="material-icons md-18">mode_edit</i>
							</a>
							<a href="" data-target="#form-delete-{{$reserva->id_reserva}}" data-toggle="modal" class="btn btn-fab btn-fab-mini btn-danger" title="Eliminar">
								<i class="material-icons md-18">delete</i>
							</a>
						</div>
					</td>
				</tr>
				@include('reservas.delete.form-delete')
				@endforeach			
			</tbody>
		</table>
	</div>

</div>            
@endsection