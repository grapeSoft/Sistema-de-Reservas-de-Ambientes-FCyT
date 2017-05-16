@extends('reservas.principal')

@section('contenido-principal-offbody')						
<div class="row">
	<dir class="col-md-8 col-md-offset-2">
		<div class="well">
		{!! Form::model($eventos->first(), ['route' => ['reservas.update', $eventos->first()->id_reserva], 'method' => 'put', 'class' => 'form-horizontal']) !!}
			@if(Auth::user()->tipo === 'docente')
			@include('reservas.edit.docente')
			@endif
			@if(Auth::user()->tipo === 'autorizado')
			@include('reservas.edit.autorizado')
			@endif
			<div class="form-group">
				<div class="col-md-3 col-md-offset-9">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
		    </div>
	  	</fieldset>
		{!! Form::close() !!}
		</div>
	</dir>
</div>         
@endsection