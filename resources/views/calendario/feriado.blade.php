@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			{!! Form::open(['route' => ['calendario.updateFeriado'],'method' => 'post','files' => true,'class' => 'form-horizontal']) !!}
			<div class="col-md-6">
				@if($errors->has('titulo'))
					<div class="form-group has-error">
				@else
					<div class="form-group">
				@endif
						{!! Form::label('titulo', 'Nombre feriado', ['class' => 'control-label col-md-4']) !!}
						<div class="col-md-8">
							{!! Form::text('titulo', null, ['class' => 'form-control']) !!}
							<div class="help-block">
								{{ $errors->first('titulo') }}
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-6">
				@if($errors->has('fecha'))
					<div class="form-group has-error">
				@else
					<div class="form-group">
				@endif
						{!! Form::label('fecha', 'Fecha', ['class' => 'control-label col-md-4']) !!}
						<div class="col-md-8">
							{!! Form::date('fecha', null, ['class' => 'form-control']) !!}
							<div class="help-block">
								{{ $errors->first('fecha') }}
							</div>
						</div>
					</div>
			</div>&nbsp;
			<div class="row">
				<div class="col-md-offset-6 col-md-6">
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
@endsection