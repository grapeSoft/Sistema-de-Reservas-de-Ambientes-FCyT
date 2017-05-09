@extends('reservas.principal')

@section('contenido-principal-offbody')						
{!! Form::model($evento, ['route' => ['reservas.update', $evento->id_evento], 'method' => 'put', 'class' => 'form-horizontal']) !!}
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="row text-center">
				<h4>Formulario de Reserva</h4>
			</div>
			<div class="panel-body">
				<div class="">
					<div class="form-group" style="margin-top: 1;">
						{!! Form::label('tipo', 'Tipo de Reservas', ['class' => 'control-label col-md-3']) !!}
						<div class="col-md-8">
							{!! Form::select('tipo', [
							'Congreso' => 'Congreso', 
							'Seminario'=> 'Seminario', 
							'Cursos' => 'Cursos', 
							'Charlas' => 'Charlas', 
							'otros' => 'Otros',], null, ['class' => 'form-control'])!!}
						</div> 
					</div>
				</div>
				<div class="">
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción...', 'rows' => '3']) !!}
							<span class="help-block">Escribe una breve descripción sobre el tipo de reserva que realices.</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}            
@endsection