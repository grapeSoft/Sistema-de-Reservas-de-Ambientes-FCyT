@extends('reservas.admin.principal')

@section('contenido-principal-admin-offbody')						
<div class="panel-body">
	<!-- <h4>Configuración Reserva Docente</h4> -->
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	@if(empty($reservas))
		<div class="alert alert-success">
			No se ha encontrado coincidencias
		</div>
	@endif
	@if(!empty($fechanovalida) && empty($reservas))
		<div class="alert alert-success">
			Debe seleccionar un rango de fechas válido.
		</div>
	@endif
	@if(!empty($horanovalida) && empty($reservas))
		<div class="alert alert-success">
			Debe seleccionar un rango de horas válido.
		</div>
	@endif
	{!! Form::open(['route' => ['reservas.filtrado'], 'role' => 'search']) !!}
	
	
	<div class="col-md-10 col-md-offset-1">
		<!-- buscador -->
		<div class="form-group">
			<div class="input-group">
				@if( !empty($nombre)  )
					
					{!! Form::text('nombre', "$nombre", ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del usuario...']) !!}
				@else
					{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del usuario...']) !!}
				@endif
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-fab btn-fab-mini"><i class="material-icons">search</i></button>
				</span>
			</div>
        </div>		
		<!-- filtrado -->
		<div class="form-group" style="margin-top: 0;">

			<div class="checkbox">
				<!-- filtrar solo cuando se marque el checkbox -->
				<label>{!! Form::checkbox('filtrado', 1, false, ['onchange' => "comprobar(this);"]) !!} Filtrado</label>
			</div>
			<p class="help-block">Activar o desactivar el filtrado en la busqueda</p>
		</div>
		<div class="col-md-6">
			<div class="form-group" style="margin-top: 3px;">
				{!! Form::label('fecha_inicial', 'Fecha Inicial', ['class' => 'control-label col-md-3']) !!}
				<div class="col-md-8">
					@if(!empty($fecha_ini)  && !empty($fecha_fin))
						{!! Form::date('fecha_inicial', "$fecha_ini", ['class' => 'form-control', 'disabled']) !!}
					@else
						{!! Form::date('fecha_inicial', null, ['class' => 'form-control', 'disabled']) !!}
					@endif
				</div>
			</div>
			<div class="form-group" style="margin-top: 0;">
				{!! Form::label('fecha_final', 'Fecha Final', ['class' => 'control-label col-md-3']) !!}
				<div class="col-md-8">
					@if(!empty($fecha_ini)  && !empty($fecha_fin))
						{!! Form::date('fecha_final', "$fecha_fin", ['class' => 'form-control', 'disabled']) !!}
					@else
						{!! Form::date('fecha_final', null, ['class' => 'form-control', 'disabled']) !!}
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group" style="margin-top: 3px;">
				{!! Form::label('hora_inicial', 'Hora Inicial', ['class' => 'control-label col-md-3']) !!}
				<div class="col-md-8">
					{!! Form::select('hora_inicial', config('sistema-reservas.horas-inicio'), null, ['class' => 'form-control', 'disabled'])!!}
				</div>
			</div>
			<div class="form-group" style="margin-top: 0;">
				{!! Form::label('hora_final', 'Hora Final', ['class' => 'control-label col-md-3']) !!}
				<div class="col-md-8">
					{!! Form::select('hora_final', config('sistema-reservas.horas-fin'), null, ['class' => 'form-control', 'disabled'])!!}
				</div>
			</div>
		</div>

	</div>
	{!! Form::close() !!}		
	<div class="row">
	<div class="col-md-12" style="margin-top: 15px;">
		<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">Usuario</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Horario</th>
					<!--<th class="text-center">Estado</th>-->
					<th class="text-center">Opciones</th>
				</tr>
			</thead>
			@if(!empty($reservas))
			<tbody>		
				@foreach($reservas as $reserva)
				<tr>
					<td>{{ $reserva->usuario->nombre }} {{ $reserva->usuario->apellido_paterno }} {{ $reserva->usuario->apellido_materno }}</td>
					<td class="text-center">{{ $reserva->horarios->first()->pivot->id_fecha }}</td>
					<td class="text-center">{{ $reserva->horarios->first()->hora_inicio }} -- {{ $reserva->horarios->last()->hora_fin }}</td>
					<!--<td class="text-center">{{ $reserva->horarios->first()->pivot->estado }}</td>-->
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
			@endif
		</table>
		</div>
		@if(!empty($reservas))
		{{ $reservas->render() }}
		@endif
	</div>
	</div>	
</div>            
@endsection
@section('script')

    <script type="text/javascript">
        function comprobar(obj)
		{   
			if (obj.checked){
			    document.getElementById('fecha_inicial').disabled = false;
				document.getElementById('fecha_final').disabled = false;
				document.getElementById('hora_inicial').disabled = false;
				document.getElementById('hora_final').disabled = false;
			}
			else{
			    document.getElementById('fecha_inicial').disabled = true;
				document.getElementById('fecha_final').disabled = true;
				document.getElementById('hora_inicial').disabled = true;
				document.getElementById('hora_final').disabled = true;
			}
		}
    </script>

@endsection