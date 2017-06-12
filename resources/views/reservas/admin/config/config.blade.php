@extends('reservas.admin.principal')

@section('contenido-principal-admin-offbody')
    <!-- @include('reservas.admin.config.docente') -->
<div class="row">
	<dir class="col-md-8 col-md-offset-2">
		<div class="well">
		<!-- <h4>Configuración Reserva Docente</h4> -->	
		@if(session('mensaje'))
            <div class="alert alert-danger">
                {{ session('mensaje') }}
            </div>
        @endif
        {!! Form::open([
            'route' => 'reservas.updateConfig',
            'method' => 'post',
            'files' => true,
            'class' => 'form-horizontal'
        	]) !!}
		<fieldset>
			<h4>Reserva Docente</h4>	
			@include('reservas.admin.config.docente')

			<!-- <h4>Reserva Autorizado</h4>
				@include('reservas.admin.config.autorizado') -->	
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