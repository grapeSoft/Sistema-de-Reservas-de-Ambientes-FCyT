@extends('reservas.admin.principal')

@section('contenido-principal-admin-offbody')						
<div class="panel-body">
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	{!! Form::open(['route' => ['reservas.filtrado'], 'class' => 'form-horizontal', 'role' => 'search']) !!}
	
	
	<div class="row">
		<!-- buscador -->
		<div class="form-group">
                
                {!! Form::label('nombre', 'Nombre', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-4">
                    {!! Form::text('nombre', null, ['class' => 'form-control'], ['placeholder' => 'Escriba el nombre del usuario:']) !!}
                </div>
                <div class="col-md-4 btn-group-raised">
                	<button type="submit" class="btn btn-primary">Buscar</button>
                </div>
        </div>
	</div>
	{!! Form::close() !!}
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
				@foreach($reservas as $reserva)
				<tr>
					<td>{{ $reserva->usuario->nombre }} {{ $reserva->usuario->apellido_paterno }} {{ $reserva->usuario->apellido_materno }}</td>
					<td>{{ $reserva->horarios->first()->pivot->id_fecha }}</td>
					<td>{{ $reserva->horarios->first()->hora_inicio }} -- {{ $reserva->horarios->last()->hora_fin }}</td>
					<td>{{ $reserva->horarios->first()->pivot->estado }}</td>
					<td>
						<div class="text-center">
							<a href="{{ route('reservas.show',['id' => $reserva->id_reserva]) }}" class="btn btn-fab btn-fab-mini btn-info" title="Ver">
								<i class="material-icons md-18">open_in_new</i>
							</a>
						</div>
					</td>
				</tr>
				@endforeach	
			</tbody>
		</table>
	</div>
	{{ $reservas->render() }}
	
	<!-- añadir paginacion -->
</div>            
@endsection