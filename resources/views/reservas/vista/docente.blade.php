<table class="table table-bordered table-hover">
	<tr>
		<td><strong>Id. de Usuario</strong></td>
		<td>{{ $datosUsuario->id_usuario }}</td>
	</tr>
	<tr>
		<td><strong>Nombre</strong></td>
		<td>{{ $datosUsuario->nombre }} {{ $datosUsuario->apellido_paterno }} {{ $datosUsuario->apellido_materno }} </td>
	</tr>
	<tr>
		<td><strong>Email</strong></td>
		<td>{{ $datosUsuario->email }}</td>
	</tr>
	<tr>
		<td><strong>Tipo de Reserva</strong></td>
		<td>Examen</td>
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
		<td>{{ $evento->nombre }}</td>
		<td>{{ $evento->grupo }}</td>
		</tr>
	@endforeach                                   
	</tbody>
</table>

<div class="btn-group btn-group-justified btn-group-raised">
	<a target="_blank" href="{{ route('crearpdf',['id' => $evento->id_reserva]) }}" class="btn btn-primary">VER PDF</a>
	<a target="_blank" href="{{ route('descargarpdf',['id' => $eventosAutorizado->id_reserva]) }}" class="btn btn-primary">DESCARGAR PDF</a>
</div>
			