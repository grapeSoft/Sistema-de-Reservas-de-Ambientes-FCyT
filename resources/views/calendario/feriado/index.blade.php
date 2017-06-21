@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
		</div>
	</div>
	<div class="text-left">
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#form-create"><i class="material-icons">add_circle</i> Crear Feriado</button>
	</div>
	@include('calendario.feriado.create.form')
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	<!--<h4 class="text-center" style="margin-top: 20px;">Feriados</h4>-->
	<div class="row">
		<div class="col-md-12" style="margin-top: 15px;">
			<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Opciones</th> 
					</tr>
				</thead>
				<tbody>
				@foreach($feriados as $feriado)		
					<tr>
						<td>{{ $feriado->descripcion}}</td>
						<td>{{ $feriado->id_fecha}}</td>
						<td>
							<a href="" data-target="#form-delete-{{$feriado->id_fecha}}" data-toggle="modal" class="btn btn-fab btn-fab-mini btn-danger" title="Eliminar">
								<i class="material-icons md-18">delete</i>
							</a>
						</td>
					</tr>
				@include('calendario.feriado.delete.form')
				@endforeach
				</tbody>
			</table>
			<div class="alert alert-dismissible alert-info">
				<p>No se creo aun ningun feriado</p>
			</div>
			</div>
		</div>
	</div>
@endsection