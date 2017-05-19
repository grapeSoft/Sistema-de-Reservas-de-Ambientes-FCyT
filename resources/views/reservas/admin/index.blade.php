@extends('reservas.admin.principal')

@section('contenido-principal-admin-offbody')						
<div class="panel-body">
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	<div class="row">
		<!-- buscador -->
	</div>
	<div class="row">
		<!-- filtrado -->
	</div>		
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Fecha</th>
					<th>Horario</th>
					<th>Estado</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>		
			</tbody>
		</table>
	</div>
	<!-- añadir paginacion -->
</div>            
@endsection