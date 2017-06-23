@extends('calendario.principal')

@section('contenido-principal-calendario')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well" style="margin-top: 10px;">
				@if(session('mensaje'))
					<div class="alert alert-danger">
						{{ session('mensaje') }}
					</div>
				@endif
			<fieldset>
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="#tab1" data-toggle="tab">Gestión Academica y Periodo de Examen</a></li>
					<li><a href="#tab2" data-toggle="tab">Información</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="tab1">
						<h4 style="margin-top: 20px;">Gestion Academica</h4>
						@yield('form-action')
					</div>
					<div class="tab-pane fade" id="tab2">
						<h4 class="text-center" style="margin-top: 20px;">Gestion Academica</h4>
						<div class="row">
							<div class="col-md-12" style="margin-top: 15px;">
								<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<th>Id</th>
											<th>Gestión</th>
											<th>Fecha Inicial</th>
											<th>Fecha Final</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										@foreach($gestiones as $gestion)
										<tr>
											<td>{{ $gestion->id_calendario }}</td>
											<td>{{ $gestion->gestion }}</td>
											<td>{{ $gestion->fecha_inicio }}</td>
											<td>{{ $gestion->fecha_fin }}</td>
											<td>
												<a href="{{ route('calendario.editConfig', ['id' => $gestion->id_calendario]) }}" class="btn btn-fab btn-fab-mini btn-success" title="Editar">
													<i class="material-icons md-18">mode_edit</i>
												</a>
												<a href="" data-target="#form-delete-{{$gestion->id_calendario}}" data-toggle="modal" class="btn btn-fab btn-fab-mini btn-danger" title="Eliminar">
													<i class="material-icons md-18">delete</i>
												</a>
											</td>
										</tr>
										@include('calendario.config.form-delete')
										@endforeach
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</fieldset>	
			</div>
		</div>
	</div>
@endsection
@section('script')
<script>
	$('.btnNext').click(function(){
	$('.nav-pills > .active').next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function(){
	$('.nav-pills > .active').prev('li').find('a').trigger('click');
	});
</script>         
@endsection