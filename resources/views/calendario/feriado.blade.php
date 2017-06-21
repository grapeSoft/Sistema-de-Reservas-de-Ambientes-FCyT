@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
		</div>
	</div>
	<div class="text-left">
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#formularioFeriado"><i class="material-icons">add_circle</i> Crear Feriado</button>
	</div>
	@include('calendario.formulario-feriado')
	<!--<h4 class="text-center" style="margin-top: 20px;">Feriados</h4>-->
	<div class="row">
		<div class="col-md-12" style="margin-top: 15px;">
			<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>		
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
@endsection