
<div class="pdf">
	<div class="pdf-encabezado">
		<h1>Sistema de Reservas FCyT-UMSS</h1>
		<img class="pdf-imagen" src="img/logo1.png">
	</div>
	<div class="pdf-cuerpo">
		<div class="pdf-cuadro-tabla">
			<div class="pdf-titulo">
				<h1>Detalle de Reserva</h1>
			</div>
			<div class="pdf-cuerpo-tabla">
				<table class="pdf-tabla">
					<tr>
						<th><strong>Nombre</strong></th>
						<td>{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }} </td>
					</tr>
					<tr>
						<th><strong>Tipo de Reserva</strong></th>
						<td>{{ $eventos->first()->tipo }}</td>
					</tr>
					<tr>
						<td><strong>Fecha de Reserva</strong></td>				               
						<td>{{ $horarios->first()->pivot->id_fecha }}</td>                                   
					</tr> 
					<tr>
						<td><strong>Periodo</strong></td>				               
						<td>{{ $horarios->first()->hora_inicio }} - {{ $horarios->last()->hora_fin  }}</td>                                   
					</tr> 
				</table>
				<table class="pdf-tabla">
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
				<div class="pdf-date">Fecha Actual: {{ $date }}</div>
			</div>
		</div>	
	</div>
</div>



<style type="text/css">


	.pdf{
		width: 99%;
		height: 99%;
		float: left;
	}
	.pdf-encabezado{
		width: 99%;
		height: 5%;
		padding-bottom: 3em;
		text-align: center;
	}
	.pdf-cuerpo{
		font-family: Arial;
		background: #E7E6E6;
		border-radius: 25px 25px 0px 0px;
		border:1px solid;
	}
	.pdf-tabla{
		background: white;
		width: 100%;
		font-size: 20px;
		padding: 10px;
	}
	.pdf-titulo{
		text-align: center;
	}
	.pdf-imagen{
		position: fixed;
		height: 75px;
		width: 75px;
	}
	td{
		border: 1px solid;
		width: 50%;
		border-radius: 7px;
		margin: 1em;
	}
	th{
		border: 1px solid;
		width: 50%;	
		border-radius: 7px;
		margin: 10px;
	}
	p, .pdf-date{
		text-align: center;
	}	

</style>
