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
		<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{ session('mensaje') }}
		</div>
	@endif
	@if(count($feriados)===0)
		<div class="alert alert-dismissible alert-info">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<p>Ningun Feriado registrado</p>
		</div>
	@endif
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th class="text-center">Nombre</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Opciones</th> 
				</tr>
			</thead>
			<tbody>
			@foreach($feriados as $feriado)		
				<tr>
					<td>{{ $feriado->descripcion}}</td>
					<td class="text-center">{{ $feriado->id_fecha}}</td>
					<td>
						<div class="text-center">
							<a href="" data-target="#form-delete-{{$feriado->id_fecha}}" data-toggle="modal" class="btn btn-fab btn-fab-mini btn-danger" title="Eliminar">
								<i class="material-icons md-18">delete</i>
							</a>
						</div>
					</td>
				</tr>
			@include('calendario.feriado.delete.form')
			@endforeach
			</tbody>
		</table>
	</div>
@endsection
@section('script')
    @if($errors->has('titulo') || $errors->has('fecha'))
        <script type="text/javascript">
            $(document).ready(function(){
            $('#form-create').modal('show');
        });
        </script>
    @endif
@endsection