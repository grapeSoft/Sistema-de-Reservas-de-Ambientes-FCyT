<table class="table table-bordered table-hover">
	<tr>
		<td><strong>Nombre</strong></td>
		<td>{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }} </td>
	</tr>
	<tr>
		<td><strong>Tipo de Reserva</strong></td>
		<td>{{ $eventos->first()->tipo }}</td>
	</tr>
	<tr>
		<td><strong>Fecha</strong></td>				               
		<td>{{ $horarios->first()->pivot->id_fecha }}</td>                                   
	</tr> 
	<tr>
		<td><strong>Periodo</strong></td>				               
		<td>{{ $horarios->first()->hora_inicio }} - {{ $horarios->last()->hora_fin  }}</td>                                   
	</tr> 
</table>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
		<th>Materia</th>
		<th>Grupo</th>
		</tr>
	</thead>
	<tbody>
	@foreach($eventos as $evento)
		<tr>
		<td>{{ $evento->grupo->materia->nombre }}</td>
		<td>{{ $evento->grupo->grupo }}</td>
		</tr>
	@endforeach                                   
	</tbody>
</table>

<div class="btn-group btn-group-justified">
	<a target="_blank" href="{{ route('crearpdf',['id' => $eventos->first()->id_reserva]) }}" class="btn btn-primary">VER PDF</a>
	<a target="_blank" href="{{ route('descargarpdf',['id' => $eventos->first()->id_reserva]) }}" class="btn btn-primary">DESCARGAR PDF</a>
</div>
			