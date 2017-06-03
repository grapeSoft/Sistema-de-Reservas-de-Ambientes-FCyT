@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
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
		</div>
	</div>
@endsection