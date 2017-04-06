@extends('plantillas.principal')

@section('contenido')
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Recurso no encontrado</h4>
		</div>
		<div class="panel-body text-center">
			<p>
				<span class="error-cod">404</span>
			</p>
			<p>				
				<span class="error-icon">
					<b class="glyphicon glyphicon-remove-sign"></b>
				</span>
			</p>
			<p>
				No se puede encontrar el recurso que esta solicitando.
			</p>
		</div>
	</div>	
</div>
@endsection