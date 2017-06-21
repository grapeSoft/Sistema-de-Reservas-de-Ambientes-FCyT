@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::open(['route' => ['calendario.updateFeriado'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('titulo', 'Nombre feriado', ['class' => 'control-label col-md-4']) !!}
					<div class="col-md-8">
						{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-4']) !!}
					<div class="col-md-8">
						{!! Form::date('fecha', null, ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="">
					<div class="form-group" style="margin-top: 0;">
						<div class="pull-right">
							<button type="submit" class="btn btn-raised btn-primary">Guardar</button>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<h4 class="text-center" style="margin-top: 20px;">Feriados</h4>
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