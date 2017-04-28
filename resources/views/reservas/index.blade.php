@extends('reservas.principal')

@section('contenido-principal-offbody')						
<div class="panel-body">						
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
				<tr>
					<td>xxxxxxxxxxxxxxxxxxxx</td>
					<td>xxxxxxxxxxxxxxxxxxxx</td>
					<td>xxxxxxxxxxxxxxxxxxxx</td>
					<td>
						<div class="text-center">
							<a href="javascript:void(0)" class="btn btn-fab btn-fab-mini btn-info">
								<i class="material-icons md-18">open_in_new</i>
							</a>
							<a href="javascript:void(0)" class="btn btn-fab btn-fab-mini btn-success">
								<i class="material-icons md-18">mode_edit</i>
							</a>
							<a href="javascript:void(0)" class="btn btn-fab btn-fab-mini btn-danger">
								<i class="material-icons md-18">delete</i>
							</a>
						</div>
					</td>
				</tr>			
			</tbody>
		</table>
	</div>	
</div>            
@endsection